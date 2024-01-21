<?php
declare (strict_types = 1);

namespace App\Core;


/**
 * Front end Controller
 */

class App
{
    //~~~~~Methods~~~~~

    public function __construct(
        protected string $controller = "App\\Controllers\\HomeController",
        protected string $action = "index",
        protected array $parameters = []
    ) {
        $this->prepareUrl();
        $this->render();
    }

    
    /**
     * extract the controller, method and parameters
     * @return void
     */
    private function prepareUrl(): void
    {
        $url = $_SERVER['QUERY_STRING'];

        if (!empty($url)) {
            $url = trim($url, '/');
            $url = explode("/", $url);

            //define the controller
            $this->controller = isset($url[0]) ? 'App\\Controllers\\'.ucwords($url[0]) . 'Controller' : 'App\\Controllers\\HomeController';

            //definde the method -action-
            $this->action = isset($url[1]) ? $url[1] : 'index';

            unset($url[0], $url[1]);

            $this->parameters = !empty($url) ? array_values($url) : [];
        }
    }

    private function render()
    { //will be run for latter and render will go to the router as "resolve" method
        if (class_exists($this->controller)) {
            $class = new $this->controller;

            if (method_exists($class, $this->action)) {
                call_user_func_array([$class, $this->action], $this->parameters);
            } else {
                //change it to error handling
                echo $this->action . ' does not exist in the ' . $this->controller . ' class';
            }
        } else {
            echo $this->controller . " not found!";
        }
    }
}
