<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $table = 'exams';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['name','degree'];
    public function courses()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function questions()
    {
        return $this->hasMany(Questions::class);
    }
}
