<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
