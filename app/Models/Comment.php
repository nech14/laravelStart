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

}
