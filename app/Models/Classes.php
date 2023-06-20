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

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'class_id');
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
