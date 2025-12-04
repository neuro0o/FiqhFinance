<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserBadge extends Model
{
    public $timestamps = false;
    protected $table = 'user_badges';
    
    protected $fillable = [
        'userID',
        'badgeID',
        'earned_at'
    ];

    protected $casts = [
        'earned_at' => 'datetime',
    ];

    // Mutator for date formatting
    public function setEarnedAtAttribute($value)
    {
        $this->attributes['earned_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badgeID', 'badgeID');
    }
}