<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $table = 'homeworks';

    protected $fillable = [
        'name','result','contain_id'
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function contain(){
        return $this->belongsTo('App\Models\Contain','contain_id','id');
    }
    public function students(){
        return $this->belongsToMany('App\User','homework_user','homework_id','user_id','id','id')->withPivot('grade');
    }
    public function question(){
        return $this->hasMany('App\Models\Questionhomework','homework_id','id');
    }
}
