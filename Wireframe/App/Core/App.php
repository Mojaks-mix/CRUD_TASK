<?php
declare (strict_types = 1);

namespace App\Core;
use PDO;
use App\Exceptions\RouteNotFoundException;

/**
 * Front end Controller
 */

class App
{
    private static PDO $db;
    //~~~~~Methods~~~~~

    public function __construct(
        protected Config $config,
        protected string $controller = "App\\Controllers\\HomeController",
        protected string $action = "index",
        protected array $parameters = []
    ) {
        static::$db = Database::pdo($config->db ?? []);
        $this->prepareUrl();
        try {
            $this->render();
        } catch (RouteNotFoundException) {
            http_response_code(404);

            View::load('error\\404');
        }
        
    }

    public static function db(): PDO
    {
        return static::$db;
    }

    
    /**
     * extract the controller, method and parameters
     * @return void
     */
    private function prepareUrl(): void
    {
        $uri = $_SERVER['QUERY_STRING'];

        if (!empty($uri)) {
            $url = trim($uri, '/');
            $url = explode("/", $url);
            
            //define the controller
            $this->controller = isset($url[0]) ? 'App\\Controllers\\'.ucwords($url[0]) . 'Controller' : 'App\\Controllers\\HomeController';

            //definde the method -action-
            $url = isset($url[1]) ? explode("&", $url[1]) : [];
            $this->action = isset($url[0]) ? $url[0] : 'index';
            unset($url[0]);

            //set the query paramenters
            $params = [];
            if(!empty($url)){
                foreach ($url as $item) {
                    list($key, $value) = explode('=', $item, 2);
                    $params[$key] = $value;
                }
                $this->parameters = !empty($params) ? ($params) : [];
            }  
        }
    }

    private function render()
    {
        if (class_exists($this->controller)) {
            $class = new $this->controller;

            if (method_exists($class, $this->action)) {

                call_user_func_array([$class, $this->action], [$this->parameters]);
                
            } else {
                throw new RouteNotFoundException();
            }
        } else {
            throw new RouteNotFoundException();
        }
    }
}