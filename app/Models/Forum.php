<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Forum extends Model
{
    use HasFactory;
    protected $table = 'forum';

    protected $fillable = [
        'class_id',
        'user_id',
        'description',
    ];

}
