<?php


namespace App;


class Role extends BaseModel
{

    protected $fillable = [
        'store_id','name'
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

}
