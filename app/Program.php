<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    public function activities()
    {
      return $this->hasMany(Activity::class);
    }
}
