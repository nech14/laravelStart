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

    public function purchased_courses(){
        return $this->morphMany(Purchased_course::class, 'purchased_course_id');
    }

    public function scopeGetName($query, $userId)
    {
        return $query->with('Users')->find($userId);
    }
}
