<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'publiched', 'publiched_at',
        'user_id', 'name',
        'text' 

    ];

    protected $cast = [

        'publiched' => 'boolean',
        'publiched_at' => 'timestamp', 
        'user_id' => 'bigInteger'

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commets(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function scopeWithUser($query, $id){
        return $query->where('id', $id)->with('user')->get();
    }
}
