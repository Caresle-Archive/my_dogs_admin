<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];


    /**
     * Return the details of the rol assigned to the user
     */
    public function rol(): HasOne {
        return $this->hasOne(Rol::class, 'id', 'rol');
    }
}
