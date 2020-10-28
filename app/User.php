<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','year_id','father_mobile',
        'is_active','is_pay','in_exam','start_exam_time','end_exam_time','ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function year(){
        return $this->belongsTo('App\Models\Year','year_id','id');
    }
    public function months(){
        return $this->belongsToMany('App\Models\Month','month_user','user_id','month_id','id','id')->withPivot(['active','activate','deactivate']);
    }

    public function exams(){
        return $this->belongsToMany('App\Models\Exam','exam_user','user_id','exam_id','id','id')->withPivot('grade');

    }
    public function homeworks(){
        return $this->belongsToMany('App\Models\Homework','homework_user','user_id','homework_id','id','id')->withPivot('grade');

    }


}
