<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
}
