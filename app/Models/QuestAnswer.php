<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class QuestAnswer extends Model
{
    protected $table = 'quest_answer';
    protected $fillable = [
        'quest_question_id', 'answer', 'is_correct'
    ];

    public function question()
    {
        return $this->belongsTo(QuestQuestion::class);
    }
}
