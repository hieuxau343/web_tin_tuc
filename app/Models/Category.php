<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\CategoryStatus;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'created_at', 'updated_at'];


    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }
}
