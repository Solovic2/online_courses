<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answerhomework extends Model
{
    protected $table = 'answerhomeworks';

    protected $fillable = [
        'answers','questionhomework_id'
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function question(){
        return $this->belongsTo('App\Models\Questionexam','questionhomework_id','id');
    }
}
