<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exam extends Model
{
    protected $table = 'exams';

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
        return $this->belongsToMany('App\User','exam_user','exam_id','user_id','id','id')->withPivot('grade');
    }
    public function question(){
        return $this->hasMany('App\Models\Questionexam','exam_id','id');
    }



}
