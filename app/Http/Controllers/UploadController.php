<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;


class UploadController extends BaseController
{

        private $filepath = './upload'; //上传目录
        private $tmpPath; //PHP文件临时目录
        private $blobNum; //第几个文件块
        private $totalBlobNum; //文件块总数
        private $fileName; //文件名

        public function __construct($tmpPath,$blobNum,$totalBlobNum,$fileName){
            $this->tmpPath = $tmpPath;
            $this->blobNum = $blobNum;
            $this->totalBlobNum = $totalBlobNum;
            $this->fileName = $fileName;

        }

        //判断是否是最后一块，如果是则进行文件合成并且删除文件块
        private function fileMerge(){
            if($this->blobNum == $this->totalBlobNum){
                $blob = '';
                for($i=1; $i<= $this->totalBlobNum; $i++){
                    $blob .= file_get_contents($this->filepath.'/'. $this->fileName.'__'.$i);
                }
                file_put_contents($this->filepath.'/'. $this->fileName,$blob);
                //$this->deleteFileBlob();
            }
        }

        //删除文件块
        private function deleteFileBlob(){
            for($i=1; $i<= $this->totalBlobNum; $i++){
                @unlink($this->filepath.'/'. $this->fileName.'__'.$i);
            }
        }

        //移动文件
        private function moveFile(){
            $this->touchDir();
            $filename = $this->filepath.'/'. $this->fileName.'__'.$this->blobNum;
            move_uploaded_file($this->tmpPath,$filename);
        }

        //API返回数据
        public function apiReturn(){
            if($this->blobNum == $this->totalBlobNum){
                if(file_exists($this->filepath.'/'. $this->fileName)){
                    $data['code'] = 2;
                    $data['msg'] = 'success';
                    $data['file_path'] = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['DOCUMENT_URI']).str_replace('.','',$this->filepath).'/'. $this->fileName;
                }
            }else{
                if(file_exists($this->filepath.'/'. $this->fileName.'__'.$this->blobNum)){
                    $data['code'] = 1;
                    $data['msg'] = 'waiting for all';
                    $data['file_path'] = '';
                }
            }
            header('Content-type: application/json');
            echo json_encode($data);
        }

        //建立上传文件夹
        private function touchDir(){
            if(!file_exists($this->filepath)){
                return mkdir($this->filepath);
            }
        }
    }

    $filename = data("Y-m-d-h-i-s").uniqid();

    public function add(Request $request)
    {

        $this->moveFile();
        $this->fileMerge();


        $data = $request->all();
        $this->check($data);
        $this->Obj->fill($data);
        $r = $this->Obj->save();
        if ($r) {
            $this->success('upload添加成功');
        } else {
            $this->error('upload添加失败');
        }


    }

}
