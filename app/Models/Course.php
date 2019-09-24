<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use EloquentFilter\Filterable;
use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use SoftDeletes;
    use Filterable;
    
    public $table = 'courses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = ['name','description','cover','level_id'];
    public function instructors()
    {
        return $this->belongsToMany(User::class);
    }
}
