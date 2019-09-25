<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    public $table = 'levels';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['name'];
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
