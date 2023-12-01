<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'first_name', 'last_name',            
        'patronymic', 'email'

    ];

    public function courses(){
        return $this->hasMany(Course::class, 'course_id');
    }

    public function purchased_courses(){
        return $this->morphMany(Purchased_course::class, 'commentable')
    }
    
}
