<?php


namespace App;


class RolePermission extends BaseModel
{

    protected $fillable = [
        'role_id',''
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
