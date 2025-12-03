<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BestScore extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'scoreID';
    
    protected $fillable = [
        'userID',
        'moduleID',
        'bestScore',
        'scored_at'
    ];

    protected $casts = [
        'scored_at' => 'datetime',
    ];

    // mutator to ensure proper date formatting
    public function setScoredAtAttribute($value)
    {
        $this->attributes['scored_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}