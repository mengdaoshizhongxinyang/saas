<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;

class IndustryController extends BaseController
{
    //
    public $Industry;

    protected $rules = [

    ];

    protected $messages = [

    ];

    public function __construct(Industry $indu)
    {
        $this->Industry = $indu;
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $this->check($data);
        $this->Industry->fill($data);
        $r = $this->Industry->save();
        if ($r) {
            $this->success('行业添加成功');
        } else {
            $this->error('行业添加失败');
        }
    }
    

    public function update(Request $request, $id)
    {
        $indu = $this->Industry->find($id);
        if (!$indu) {
            $this->error('行业不存在');
        }

        $data = $request->all();
        //编辑和添加的表单验证规则可以不一样
        //$this->rules['content'] = 'required';
        //$this->messages['content.required'] = '内容必填';
        $this->check($data);

        $indu->fill($data);
        $r = $this->Industry->save();
        if ($r) {
            $this->success('行业更新成功');
        } else {
            $this->error('行业更新失败');
        }
    }

    public function getList()
    {
        $r = $this->Industry->get();

        $this->success($r);
    }

    public function show($id)
    {
        $r = $this->Industry->getById($id);
        $this->success($r);
    }
}
