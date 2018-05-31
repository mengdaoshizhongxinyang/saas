<?php


namespace App;


class Store extends BaseModel
{

    protected $fillable=[
        'name','creater_id','logo_path','industry','state','mobile_phone','store_no','operation_mode'
    ];
    protected $hidden = [

    ];
    /*
     * 外键代码示例
     public function category()
    {
        return $this->belongsTo('App\Category')->select('id', 'name');
    }
     */

    public function user(){
        return $this->belongsTo('App\User','creater_id');
    }

}
