<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProjectLog extends Model
{
    protected $table = 'project_log';
    protected $fillable = [
        'class_id', 'user_id', 'photo', 'status'
    ];
}
