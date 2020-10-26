<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = [
        'name','admin_id','year_id'
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function teacher(){
        return $this->belongsTo('App\Admin','admin_id','id');
    }
    public function year(){
        return $this->belongsTo('App\Models\Year','year_id','id');
    }
    public function months(){
        return $this->hasMany('App\Models\Month','subject_id','id');
    }

}
