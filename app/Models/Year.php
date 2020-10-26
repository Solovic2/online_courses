<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Year extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'years';
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];
    public function teachers(){
        return $this->belongsToMany('App\Admin','admin_year','year_id','admin_id','id','id');
    }
    public function subjects(){
        return $this->hasMany('App\Models\Subject','year_id','id');
    }
    public function students(){
        return $this->hasMany('App\User','year_id','id');
    }
    public function months(){
        return $this->hasManyDeep('App\Models\Month',['App\Models\Subject'],['year_id','subject_id'],['id','id']);
    }
}
