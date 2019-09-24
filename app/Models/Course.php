<?php

namespace App\Models;
use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table = 'courses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['name','description','cover','level_id'];
    public function instructors()
    {
        return $this->belongsToMany(User::class);
    }
}
