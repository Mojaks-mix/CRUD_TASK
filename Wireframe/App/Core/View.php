<?php

namespace App\Core;
use App\Exceptions\ViewNotFoundException;
use Smarty;

class View extends Smarty
{
    public function __construct(){
        parent::__construct();
        $this->setTemplateDir(VIEWS . 'templates');
        $this->setConfigDir(SMARTY_ENGINE . 'configs');
        $this->setCompileDir(SMARTY_ENGINE . 'templates_c');
        $this->setCacheDir(SMARTY_ENGINE . 'cache');
        $this->registerPlugin('function', 'plugin_url', 'smarty_function_plugin_url');
        //$smarty->testInstall();
        //$smarty->display('Views\home.tpl');
    }

    public static function load(string $viewName, array $viewData = [])
    {
        $view = new View();
        return $view->render($viewName, $viewData);

    }

    public function render(string $viewName, array $viewData = []){
        $file = VIEWS . 'templates' . DS . $viewName . '.tpl';
        if(file_exists($file)){
            $this->assign("data",$viewData);

            $this->display($file);
        }
        else{
            throw new ViewNotFoundException();
        }
    }
}
