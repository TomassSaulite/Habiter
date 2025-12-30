<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'notes',
        'mood',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function habits()
    {
        return $this->belongsToMany(Habits::class)
            ->using(DayHabit::class)
            ->withPivot('completed')
            ->withTimestamps();
    }
}
