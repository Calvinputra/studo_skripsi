<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class QuestCompletion extends Model
{
    protected $table = 'quest_completion';

    protected $fillable = [
        'quest_id',
        'user_id',
        'score',
        'quest_type',
    ];
}
