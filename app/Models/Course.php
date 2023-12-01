<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;


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

    public function coaches(){
        return $this->belongsToMany(Coach::class, 'coach_id');
    }

    public function scopeWithCoach($query, $coachId){
        return $query->where('coach_id', $coachId)->with('coach')->get();
    }
}
