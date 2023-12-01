<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [

        'user_id', 'working_position',
        'city', 'organization'

    ];

    protected $cast = [

        'user_id' => 'bigInteger'

    ];

    public function users(){
        return $this->belongsToMany(User::class, 'position', 'working_position', 'user_id');
    }
}
