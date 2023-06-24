<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Goal extends Model
{
    protected $table = 'goals';
    protected $fillable = [
        'subscription_id', 'notes', 'start_date', 'end_date'
    ];
}
