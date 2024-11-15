<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['username', 'email', 'fullname', 'password', 'phone', 'gender', 'birthday', 'role', 'created_at', 'updated_at'];
}
    