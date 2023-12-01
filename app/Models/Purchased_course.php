<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchased_course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'user_id', 'course_id',
        'rating', 'comment'

    ];

    protected $cast = [

        'user_id' => 'bigInteger',
        'course_id' => 'bigInteger',
        'rating' => 'float'

    ];

    public function commentable(){
        return $this->morphTo();
    }

    public function scopeWithUser($query, $userId){
        return $query->where('user_id', $userId)->with('user')->get();
    }

    public function scopeWithCourse($query, $courseId){
        return $query->where('course_id', $courseId)->with('course')->get();
    }
}
