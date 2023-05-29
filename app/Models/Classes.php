<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';

    protected $fillable = [
        'name', 'description', 'slug', 'thumbnail', 'competency_unit',
        'status','duration','category',
        'price', 'discount'
    ];
}
