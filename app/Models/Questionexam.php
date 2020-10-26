<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionexam extends Model
{
    protected $table = 'questionexams';

    protected $fillable = [
        'name','exam_id','correct'
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function exam(){
        return $this->belongsTo('App\Models\Exam','exam_id','id');
    }
    public function answer(){
        return $this->hasMany('App\Models\Answerexam','questionexam_id','id');
    }
}
