<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_dog_type',
        'height',
        'weight',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
