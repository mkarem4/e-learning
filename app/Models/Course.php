<?php

namespace App\Models;

use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function instructors()
    {
        return $this->belongsToMany(User::class);
    }
}
