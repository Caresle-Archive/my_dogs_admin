<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DogBreed extends Model
{
    use HasFactory;

    protected $table = "dog_breeds";

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function dog(): BelongsToMany {
        return $this->belongsToMany(Dog::class, 'id_dog_type', 'id');
    }
}
