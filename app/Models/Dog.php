<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function dog_type() : HasOne {
        return $this->hasOne(DogBreed::class, 'id', 'id_dog_type');
    }
}
