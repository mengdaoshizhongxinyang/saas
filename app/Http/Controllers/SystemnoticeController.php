<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Systemnotice;


class SystemnoticeController extends BaseController
{
    //默认对应的模型对象。
    public $Obj;

    //构造函数，默认注入控制器同名对象
    public function __construct(Systemnotice $Systemnotice)
    {
        $this->Obj = $Systemnotice;
    }

    /*
     * 系统公告添加
     */
    public function add(Request $request)
    {
        $data = $request->all();
        $this->check($data);
        $this->Obj->fill($data);
        $r = $this->Obj->save();
        if ($r) {
            $this->success('系统公告添加成功');
        } else {
            $this->error('系统公告添加失败');
        }
    }

    /*
     * 删除指定id的系统公告
     */
    public function del($id)
    {
        $delnum = $this->Obj->destroy($id);
        if ($delnum) {
            $this->success('系统公告删除成功');
        } else {
            $this->error('系统公告删除失败');
        }

    }

    /*
     * 更新指定id的系统公告
     */
    public function update(Request $request, $id)
    {
        $record = $this->Obj->find($id);
        if (!$record) {
            $this->error('系统公告不存在');
        }


        $data = $request->all();
        //编辑和添加的表单验证规则可以不一样
        //$this->rules['content'] = 'required';
        //$this->messages['content.required'] = '内容必填';
        $this->check($data);

        $record->fill($data);
        $r = $record->save();
        if ($r) {
            $this->success('系统公告更新成功');
        } else {
            $this->error('系统公告更新失败');
        }
    }



    /*
     * 查看系统公告
     */
    public function show()
    {
        $r = $this->Obj->get();
        $this->success($r);
    }
}





























