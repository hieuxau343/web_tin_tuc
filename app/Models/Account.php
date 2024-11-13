<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['fullname', 'email', 'phone', 'gender', 'birthday', 'role'];
}
