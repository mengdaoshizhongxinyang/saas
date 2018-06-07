<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;


class StaffController extends BaseController
{
    //默认对应的模型对象。
    public $Obj;

    //表单验证规则
    protected $rules = [
//        'title' => 'bail|required|max:50',
//        'category_id' => 'integer'
    ];

    //表单错误提示消息
    protected $messages = [
//        'title.required' => '标题必填',
//        'title.max' => '标题不能超过50个字符',
//        'category_id' => '分类id错误'
    ];

    //构造函数，默认注入控制器同名对象
    public function __construct(Staff $staff)
    {
        $this->Obj = $staff;
    }

    /*
     * 员工添加
     */
    public function add(Request $request)
    {
        $data = $request->all();

        $data['store_id']=2;
        $this->check($data);
        $this->Obj->fill($data);
        $r = $this->Obj->save();
        if ($r) {
            $this->success('员工添加成功');
        } else {
            $this->error('员工添加失败');
        }
    }

    /*
     * 删除指定id的员工
     */
    public function del($id)
    {
        $delnum = $this->Obj->destroy($id);
        if ($delnum) {
            $this->success('员工删除成功');
        } else {
            $this->error('员工删除失败');
        }

    }

    /*
     * 更新指定id的员工
     */
    public function update(Request $request, $id)
    {
        $record = $this->Obj->find($id);
        if (!$record) {
            $this->error('员工不存在');
        }


        $data = $request->all();
        //编辑和添加的表单验证规则可以不一样
        //$this->rules['content'] = 'required';
        //$this->messages['content.required'] = '内容必填';
        $this->check($data);

        $record->fill($data);
        $r = $record->save();
        if ($r) {
            $this->success('员工更新成功');
        } else {
            $this->error('员工更新失败');
        }
    }


    /*
     * 获取员工列表
     */
    public function getList()
    {
        $sid=2;
        $r = $this->Obj
            ->where('store_id',$sid)
            ->with('role')
            ->orderBy('id', 'desc')
            ->paginate();

        $this->success($r);
    }

    /*
     * 查看指定id的员工
     */
    public function show($id)
    {
        $r = $this->Obj->getById($id);
        $this->success($r);
    }
}

