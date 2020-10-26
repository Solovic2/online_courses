<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admins';

    protected $fillable = [
        'name','email','password','mobile'
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];
    public function years(){
        return $this->belongsToMany('App\Models\Year','admin_year','admin_id','year_id','id','id');
    }
    public function subject(){
        return $this->hasOne('App\Models\Subject','admin_id','id');
    }
}
