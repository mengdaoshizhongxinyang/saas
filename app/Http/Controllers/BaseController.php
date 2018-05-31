<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;

class BaseController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /***
     * @param int $errcode，错误码，0表示成功，不同的错误码请参考手册
     * @param string $msg 提示消息
     * @param array $data 消息返回的数据
     */
    protected function msg($errcode = 0, $msg = '', $data = [])
    {
        header('Content-Type:application/json; charset=utf-8');
        $r = [
            'errcode' => $errcode,
            'msg' => $msg,
            'data' => $data
        ];
        exit(json_encode($r));
    }

    protected function success($msg = '', $data = [])
    {
        if (is_string($msg)) {
            $this->msg(0, $msg, $data);
        } else {
            $this->msg(0, '', $msg);
        }

    }

    protected function error($msg = '', $errcode = -1)
    {
        $this->msg($errcode, $msg);
    }

    protected $rules = [];
    protected $messages = [];

    protected function check($data)
    {
        $validator = Validator::make($data, $this->rules, $this->messages);
        if ($validator->fails()) {
            $this->error($validator->errors()->first());
        }
    }

}
