<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{

    protected $table = 'diary';
    
    protected $fillable = [
        'user_id',
        'name',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
