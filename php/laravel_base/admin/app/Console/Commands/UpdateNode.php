<?php

namespace App\Console\Commands;

use Route;
use Carbon\Carbon;
use App\Models\Node;
use Illuminate\Console\Command;

class UpdateNode extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:node';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private $_except = ['api', 'login', 'logout'];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Node::where('id', '>', 0)->update(['status' => 0]);
        $routes = Route::getRoutes();

        foreach ($routes as $key => $route) {
            $alias = $route->getName();
            $path = $route->getActionName();

            if ($alias && $this->_except($alias)) {   //有别名，表示非系统自动生成的控制器
                $routeArr = explode('@', $path);
                $pid = $this->_getPid($routeArr[0]);
                if ($model = $this->_getModelByPath($path)) {
                    $this->_updateNode($model);
                } else {
                    $this->_saveNode($path, $pid, $alias);
                }
            }
        }

        echo 'success';
    }

    private function _getPid($path)
    {
        if ($model = $this->_getModelByPath($path)) {
            return $this->_updateNode($model);
        } else {
            return $this->_saveNode($path);
        }
    }

    private function _updateNode(Node $model)
    {
        $model->status = 1;
        $model->save();

        return $model->id;
    }

    private function _saveNode($path, $pid = 0, $alias = '')
    {
        $data = [
            'name' => $alias ? $alias : $path,
            'path' => $path,
            'alias' => $alias,
            'pid' => $pid,
            'status' => 1
        ];
        $model = Node::create($data);

        return $model->id;
    }

    /**
     * 根据文件位置获取信息
     * @param type $path
     * @return type
     */
    private function _getModelByPath($path)
    {
        return Node::where('path', $path)->first();
    }

    private function _except($alias)
    {
        foreach ($this->_except as $except) {
            if (stristr($alias, $except)) {
                return false;
            }
        }
        return true;
    }

}
