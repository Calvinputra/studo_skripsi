<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Quest extends Model
{
    protected $table = 'quest';

    public function question()
    {
        return $this->hasMany('App\Models\QuestQuestion', 'quiz_id');
    }
}
