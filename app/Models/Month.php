<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $table = 'months';

    protected $fillable = [
        'name','code','subject_id',
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function students(){
        return $this->belongsToMany('App\User','month_user','month_id','user_id','id','id')->withPivot(['active','activate','deactivate']);
    }
    public function subject(){
        return $this->belongsTo('App\Models\Subject','subject_id','id','id');
    }
    public function contains(){
        return $this->hasMany('App\Models\Contain','month_id','id');
    }




}
