<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{
    protected $table = 'contains';

    protected $fillable = [
        'name','video','branch','month_id'
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function month(){
        return $this->belongsTo('App\Models\Month','month_id','id','id');
    }
    public function exam(){
        return $this->hasOne('App\Models\Exam','contain_id','id');
    }
    public function homework(){
        return $this->hasOne('App\Models\Homework','contain_id','id');
    }
}
