<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Leaderboard extends Model
{
    use HasFactory;
    protected $table = 'leaderboard';

    protected $fillable = [
        'user_id',
        'class_id',
        'total_chapter',
        'duration',
    ];

}
