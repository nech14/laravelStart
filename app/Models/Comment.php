<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'commentable_id', 'commentable_type', 
        'user_id', 'rating', 'comment'

    ];

    protected $cast = [

        'user_id' => 'bigInteger',
        'rating' => 'float'

    ];

    public function commentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeWithUser($query, $id){
        return $query->where('id', $id)->with('user')->get();
    }

    public function scopeWithCommentable($query, $id){
        return $query->where('id', $id)->with('commentable')->get();
    }

    public function scopeWithUserPost($query, $id){
        return $query->where('id', $id)->with('user')->with('commentable')->get();
    }
}
