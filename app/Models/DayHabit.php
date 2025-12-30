<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DayHabit extends Pivot
{
    protected $table = 'day_habit';

    protected $fillable = [
        'day_id',
        'habit_id',
        'completed',
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];
}
