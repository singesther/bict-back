<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
	public function team()
    {
        return $this->belongsToMany(Team::class);
    }
}
