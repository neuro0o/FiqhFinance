<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $primaryKey = 'userID';
    protected $keyType = 'int';
    public $incrementing = true;

    // tell Laravel which column to use for auth
    public function getAuthIdentifierName()
    {
        return $this->primaryKey; // or 'userID'
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'userEmail',
        'userName',
        'password',
        'profileImg',
        'userRole',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationships
     */
    
    // Module attempts relationship
    public function attempts()
    {
        return $this->hasMany(ModuleAttempt::class, 'userID', 'userID');
    }

    // Best scores relationship
    public function bestScores()
    {
        return $this->hasMany(BestScore::class, 'userID', 'userID');
    }

    // Badges relationship (many-to-many)
    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges', 'userID', 'badgeID')
                    ->withPivot('earned_at');
    }

    /**
     * Helper methods
     */
    
    // Check if user has earned a specific badge
    public function hasBadge($badgeName)
    {
        return $this->badges()->where('badgeName', $badgeName)->exists();
    }

    // Get best score for a specific module
    public function getBestScoreForModule($moduleID)
    {
        return $this->bestScores()
                    ->where('moduleID', $moduleID)
                    ->first();
    }

    // Get total number of earned badges
    public function totalBadgesEarned()
    {
        return $this->badges()->count();
    }

    // Get average score across all modules
    public function averageScore()
    {
        $scores = $this->bestScores()->pluck('bestScore');
        return $scores->isEmpty() ? 0 : round($scores->avg(), 1);
    }
}