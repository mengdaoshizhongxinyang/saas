<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends BaseController
{

    public $User;

    protected $rules = [

    ];

    protected $messages = [

    ];

    public function __construct(User $user)
    {
        $this->User = $user;
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $this->check($data);
        $this->User->fill($data);
        $r = $this->User->save();
        if ($r) {
            $this->success('用户添加成功');
        } else {
            $this->error('用户添加失败');
        }
    }

    public function del($id)
    {
        $delnum = $this->User->destroy($id);
        if ($delnum) {
            $this->success('用户删除成功');
        } else {
            $this->error('用户删除失败');
        }

    }

    public function update(Request $request, $id)
    {
        $user = $this->User->find($id);
        if (!$user) {
            $this->error('用户不存在');
        }

        $data = $request->all();
        //编辑和添加的表单验证规则可以不一样
        //$this->rules['content'] = 'required';
        //$this->messages['content.required'] = '内容必填';
        $this->check($data);

        $r = $user->fill($data);
        $r = $this->User->save();
        if ($r) {
            $this->success('用户更新成功');
        } else {
            $this->error('用户更新失败');
        }
    }

    public function getListByCreaterId($creater_id = null)
    {
        $r = $this->User
            ->where('creater_id','=',$creater_id)
            ->orderBy('id', 'desc')
            ->paginate();

        $this->success($r);
    }

    public function show($id)
    {
        $r = $this->User->getById($id);
        $this->success($r);
    }

}