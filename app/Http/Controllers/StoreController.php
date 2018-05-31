<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;


class StoreController extends BaseController
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
    public function __construct(Store $Store)
    {
        $this->Obj = $Store;
    }

    /*
     * 商店添加
     */
    public function add(Request $request)
    {
        $data = $request->all();
        $data['creater_id']=2;
        $data['store_no']=80000000+rand(0,100000);
        $this->check($data);
        $this->Obj->fill($data);
        $r = $this->Obj->save();
        if ($r) {
            $this->success('商店添加成功');
        } else {
            $this->error('商店添加失败');
        }
    }

    /*
     * 删除指定id的商店
     */
    public function del($id)
    {
        $delnum = $this->Obj->destroy($id);
        if ($delnum) {
            $this->success('商店删除成功');
        } else {
            $this->error('商店删除失败');
        }

    }

    /*
     * 更新指定id的商店
     */
    public function update(Request $request, $id)
    {

        $record = $this->Obj->find($id);
        if (!$record) {
            $this->error('商店不存在');
        }


        $data = $request->all();
//        $data=$data1['UpdateData'];d
//        echo $data;
        //编辑和添加的表单验证规则可以不一样
        //$this->rules['content'] = 'required';
        //$this->messages['content.required'] = '内容必填';
        $this->check($data);

        $record->fill($data);
        $r = $record->save();
        if ($r) {
            $this->success('商店更新成功');
        } else {
            $this->error('商店更新失败');
        }
    }


    /*
     * 获取商店列表
     */
    public function getListByCreaterId($creater_id = null)
    {
        $r = $this->Obj
            ->where('creater_id','=',$creater_id)
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate();

        $this->success($r);
    }
    /*
     * 查看指定id的商店
     */
    public function show()
    {
        $r = $this->Obj->get();
        $this->success($r);
    }

    public function ss()
    {
        return "ffff";
    }

}





























