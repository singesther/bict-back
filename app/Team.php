<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
