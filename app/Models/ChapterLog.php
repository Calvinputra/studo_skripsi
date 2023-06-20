<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ChapterLog extends Model
{
    use HasFactory;
    protected $table = 'chapter_log';

    protected $fillable = [
        'user_id', 'class_id', 'status'
    ];
}
