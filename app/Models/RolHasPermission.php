<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolHasPermission extends Model
{
    use HasFactory;

    protected $table = 'rol_has_permission';

    protected $fillable = [
        'rol_id',
        'permission_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
