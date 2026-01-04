<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class HabitCompletion extends Pivot
{
    protected $fillable = [
        'habit_id',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime', // so we can use isToday() etc.
    ];

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}
