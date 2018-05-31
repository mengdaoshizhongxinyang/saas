<?php

namespace App;

class store2 extends BaseModel
{
    //
    protected $fillable=[
        'name','creater_id','logo_path','industry','state','mobile_phone','store_no','operation_mode'
    ];

    public function user(){
        return $this->belongsTo('App\User','creater_id');
    }
}
