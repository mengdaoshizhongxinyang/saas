<?php


namespace App;


class Staff extends BaseModel
{
    protected $fillable = [
        'name','mobile_phone','email','store_id','role_id','ig_login','state','user_id','avatar'
    ];
    protected $hidden = [

    ];
     public function role()
    {
        return $this->belongsTo('App\Role','role_id')->select('id','name');
    }

}
