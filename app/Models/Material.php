<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public $table = 'materials';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['name', 'type', 'chapter', 'file', 'note', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
