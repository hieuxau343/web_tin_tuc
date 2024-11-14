<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['id', 'title', 'image', 'link', 'created_at', 'updated_at', 'status'];
}
