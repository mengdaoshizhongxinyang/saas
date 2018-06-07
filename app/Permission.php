<?php


namespace App;


class Permission extends BaseModel
{

    protected $fillable = [

    ];
    protected $hidden = [

    ];

    public $timestamps=false;
    /*
     * 外键代码示例
     public function category()
    {
        return $this->belongsTo('App\Category')->select('id', 'name');
    }
     */

}
