<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function instructors()
    {
        return $this->belongsToMany(Instructor::class);
    }
}
