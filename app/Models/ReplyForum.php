<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReplyForum extends Model
{
    use HasFactory;
    protected $table = 'reply_forum';

    protected $fillable = [
        'forum_id',
        'user_id',
        'description',
    ];
   
}
