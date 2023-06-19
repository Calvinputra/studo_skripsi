<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class QuestQuestion extends Model
{
    protected $table = 'quest_question';
    protected $fillable = [
        'quest_id', 'quest_type', 'priority', 'question'
    ];

    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }

    public function answers()
    {
        return $this->hasMany(QuestAnswer::class);
    }
}
