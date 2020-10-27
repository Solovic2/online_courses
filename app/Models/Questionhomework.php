<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionhomework extends Model
{
    protected $table = 'questionhomeworks';

    protected $fillable = [
        'name','homework_id','correct','user_answer',
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function homework(){
        return $this->belongsTo('App\Models\Homework','homework_id','id');
    }
    public function answer(){
        return $this->hasMany('App\Models\Answerhomework','questionhomework_id','id');
    }
}
