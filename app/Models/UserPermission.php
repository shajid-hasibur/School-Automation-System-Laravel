<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    public function permissionUser()
    {
        return $this->belongsToMany(User::class);
    }

    public function rolesUsers()
    {
        return $this->belongsToMany(User::class);
    }
}
