<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $fillable = [

        'name', 'lastname',
        'email', 'age',
        'ban', 'password'
        
    ];

    // protected $hidden = [

    //     'password'

    // ];

    protected $cast = [
        'age' => 'integer',
        'ban' => 'boolean'
    ];

    public function post(){
        return $this->hasMany(Post::class, 'user_id');
    }

    public function position(){
        return $this->hasOne(Position::class, 'user_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }



}
