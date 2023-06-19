<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Quest extends Model
{
    protected $table = 'quest';

     public function questions()
    {
        return $this->hasMany(QuestQuestion::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
