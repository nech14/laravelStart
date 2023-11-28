<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchased_course extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id', 'course_id',
        'rating', 'comment'

    ];

    protected $cast = [

        'user_id' => 'bigInteger',
        'course_id' => 'bigInteger',
        'rating' => 'float'

    ];
}
