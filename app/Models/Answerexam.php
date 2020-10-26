<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answerexam extends Model
{
    protected $table = 'answerexams';

    protected $fillable = [
        'answers','questionexam_id',
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function question(){
        return $this->belongsTo('App\Models\Questionexam','questionexam_id','id');
    }

}
