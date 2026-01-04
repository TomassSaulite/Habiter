<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Habit extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'counter',
        'last_completed',
    ];

    protected $casts = [
        'last_completed' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class)
            ->using(DayHabit::class)
            ->withPivot('completed')
            ->withTimestamps();
    }
    public function completions()
    {
        return $this->hasMany(HabitCompletion::class);
    }
}
