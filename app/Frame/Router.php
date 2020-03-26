<?php

namespace Frame;

use FastRoute;

class Router{

    public function setRoutes(){
        $routes = include dirname(__DIR__).'/routes.php';
        return FastRoute\simpleDispatcher($routes);
    }

    public function runRoute($dispatcher)
    {
        $uri = $_SERVER['REQUEST_URI'];

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
         
        $routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], rawurldecode($uri));
        if($routeInfo[0] == FastRoute\Dispatcher::FOUND) {
            if(is_string($routeInfo[1])){
           $route=explode("::",$routeInfo[1]);
            $method = [ new $route[0], $route[1]];
            }
            elseif(is_callable($routeInfo[1])) {
                $method = $routeInfo[1];
            }
          
           echo call_user_func_array($method, $routeInfo[2]); 
        }
        elseif($routeInfo[0] == FastRoute\Dispatcher::NOT_FOUND){
            header("HTTP/1.0 404 Not Found");
        }
        
    }

   
}




   