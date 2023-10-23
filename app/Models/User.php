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
        'role',
        'token',
        'status',
    ];

    protected $hidden = [
        'password',
        'token',
        'created_at',
        'updated_at',
    ];


    /**
     * Return the details of the rol assigned to the user
     */
    public function role(): HasOne {
        return $this->hasOne(Role::class, 'id', 'role');
    }
}
