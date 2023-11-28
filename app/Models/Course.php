<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    protected $fillable = [

        'publiched', 'publiched_at',
        'coach_id', 'name',
        'body', 'price'   

    ];

    protected $cast = [

        'publiched' => 'boolean',
        'publiched_at' => 'timestamp',
        'coach_id' => 'bigInteger',
        'price' => 'decimal'

    ];
}
