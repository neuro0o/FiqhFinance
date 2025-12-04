<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'badgeID';
    
    protected $fillable = [
        'badgeName',
        'badgeDesc',
        'badgeIcon',
        'scoreThreshold'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_badges', 'badgeID', 'userID')
                    ->withPivot('earned_at');
    }
}
