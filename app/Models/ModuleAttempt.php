<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ModuleAttempt extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'attemptID';
    
    protected $fillable = [
        'userID',
        'moduleID',
        'score',
        'attempted_at'
    ];

    protected $casts = [
        'attempted_at' => 'datetime',
    ];

    // mutator to ensure proper date formatting
    public function setAttemptedAtAttribute($value)
    {
        $this->attributes['attempted_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}