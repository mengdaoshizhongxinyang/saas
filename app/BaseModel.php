<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BaseModel extends Model
{
    protected $perPage = 20;


    public static function getById($id)
    {
        return static::where('id', $id)->first();
    }

    public static function getList()
    {
        return static::orderBy('id', 'desc')->paginate();
    }

    public static function getListWith($with=[])
    {
        $static = static::orderBy('id', 'desc');
        if(is_array($with)){
            foreach($with as $w){
                $static->with($w);
            }
        }
        return $static->paginate();
    }
}
