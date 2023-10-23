<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;

    protected $table = 'role_has_permission';

    protected $fillable = [
        'role_id',
        'permission_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
