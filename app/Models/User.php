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

        'first_name', 'last_name',          
        'patronymic', 'email',
        'ban',        'password'
        
    ];

    // protected $hidden = [

    //     'password'

    // ];

    protected $cast = [
        'ban' => 'boolean'
    ];

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

}
