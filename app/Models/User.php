<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, AuthenticableTrait;
    protected $fillable = ['login', 'password'];
}
