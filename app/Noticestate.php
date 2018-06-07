<?php

namespace App;

class Noticestate extends BaseModel
{

    protected $fillable = [
        'user_id','is_read','notice_id'
    ];
     public function systemnotice()
    {
        return $this->belongsTo('App\Systemnotice','notice_id');
    }

}
