<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $guarded = [];
    protected $hidden = ['password'];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
