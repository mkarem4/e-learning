<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table = 'courses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['name', 'description', 'cover', 'level_id', 'user_id'];

    public function instructor()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
