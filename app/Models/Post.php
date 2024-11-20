<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image', 'updated_at', 'created_at', 'category_id', 'status', 'user_id'];

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    public function getFormattedUpdatedAtAttribute()
    {
        return $this->updated_at->format('d-m-Y');
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
