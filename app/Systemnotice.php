<?php


namespace App;


class Systemnotice extends BaseModel
{

    protected $fillable = [
        'title','notice_level','content','sender_name','notice_type','is_read'
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
