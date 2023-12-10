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

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeWithUser($query, $user_id){
        return $query->where('user_id', $user_id)->with('user')->get();
    }
}
