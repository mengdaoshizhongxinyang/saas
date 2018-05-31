<?php

namespace App\Console\Commands\MakeCommonCodeTPL;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeCommonCodeTPL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kinfy{table_name}{comment_name?}';

    private $files;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating Controller Model and Route code';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();
        $this->files=$filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //读取模板文件



        //批量替换文件内的占位符
        /***
         * 读取参数名，假设参数名叫article
         * 参数名全小写处理，再首字母大写
         */

        $table=$this->argument('table_name');
        $Table=ucfirst($table);
        $comment=$this->argument('comment_name');
        if(!$comment){
            $comment=$table;
        }

        $comment=iconv('GBK','utf-8',$comment);

        $controller_file=base_path("app/Http/Controllers/{$Table}Controller.php");
        $model_file=base_path("app/{$Table}.php");
        $route_file=base_path("routes/web.php");

        $find=['KF_NAME','KF_name','KF_CMT'];
        $replace=[$Table,$table,$comment];

        //        如果控制器已经存在，询问是否继续
        //        如果模型存在，询问是否继续
        //        附加陆游代码到路由文件去
        $create_controller=true;


        if($this->files->exists($controller_file)){
            $create_controller=$this->confirm("{$Table}Controller already exists,this will overwrite it,continue");
        }
        if($create_controller){
            $controller = $this->files->get(__DIR__.'/tpls/controller.php');
            $controller="<?php\n".str_replace($find,$replace,$controller);
            $this->files->put($controller_file,$controller);
            $this->info("{$Table}Controller created success!");
        }else{
            $this->info("{$Table}Controller did not created!");
        }

        $create_model=true;

        if($this->files->exists($model_file)){
            $create_model=$this->confirm("{$Table}Model already exists,this will overwrite it,continue");
        }
        if($create_model){
            $model=$this->files->get(__DIR__.'/tpls/model.php');
            $model="<?php\n".str_replace($find,$replace,$model);
            $this->files->put($model_file,$model);
            $this->info("{$Table}Model created success!");
        }else{
            $this->info("{$Table}Model did not created!");
        }

        $create_route=true;
        $route=$this->files->get(__DIR__.'/tpls/route.php');
        $route_old=$this->files->get($route_file);
        if(strpos($route_old,"{$comment}路由"!==false)){
            $create_route=$this->confirm("{$Table}Route already exists,this will overwrite it,continue");
        }
        if($create_route){
            $route="\n".str_replace($find,$replace,$route);
            $this->files->append($route_file,$route);
            $this->info("{$Table}Route appended success!");
        }else{
            $this->info("{$Table}Route appended cancel!");
        }
    }
}
