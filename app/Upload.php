<?php


namespace App;


class Upload extends BaseModel
{
    protected $table = 'upload';

    protected $fillable = [

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
