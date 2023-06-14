<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'chapters';

    protected $fillable = [
        'name', 'type', 'duration', 'priority'
    ];
}
