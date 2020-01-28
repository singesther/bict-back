<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'gender', 'dob','country', 'district', 'sector', 'cell', 'village', 'status'];
    
    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
