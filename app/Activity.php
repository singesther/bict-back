<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    public function program()
    {
       return $this->belongsTo(Program::class, 'program_id');
    }
}
