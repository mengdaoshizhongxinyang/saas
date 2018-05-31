<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\store2;


class Store1Controller extends BaseController
{

    public $Store;

    protected $rules = [

    ];

    protected $messages = [

    ];

    public function __construct(store2 $sto)
    {
        $this->Store = $sto;
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $data['store_no']=80000000+rand(0,100000);
        $data['creater_id']=2;
        $this->check($data);
        $this->Store->fill($data);
        $r = $this->Store->save();
        if ($r) {
            $this->success('店铺添加成功');
        } else {
            $this->error('店铺添加失败');
        }
    }

    public function del($id)
    {
        $delnum = $this->Store->destroy($id);
        if ($delnum) {
            $this->success('店铺删除成功');
        } else {
            $this->error('店铺删除失败');
        }

    }

    public function update(Request $request, $id)
    {
        $sto = $this->Store->find($id);
        if (!$sto) {
            $this->error('店铺不存在');
        }

        $data = $request->all();
        //编辑和添加的表单验证规则可以不一样
        //$this->rules['content'] = 'required';
        //$this->messages['content.required'] = '内容必填';
        $this->check($data);
        $data['creater_id']='2';
        $this->fill($data);
        var_dump($data);
        $r = $this->save();

        if ($r) {
            $this->success('店铺更新成功');
        } else {
            $this->error('店铺更新失败');
        }
    }

    public function getListByCreaterId($creater_id = null)
    {
        $r = $this->Store
            ->where('creater_id','=',$creater_id)
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate();

        $this->success($r);
    }

    public function show($id)
    {
        $r = $this->Store->getById($id);
        $this->success($r);
    }

    public function ss()
    {
        return "ffff";
    }

}