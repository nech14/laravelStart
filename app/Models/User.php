<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Authenticate
{
    use HasFactory, Notifiable;

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

}
