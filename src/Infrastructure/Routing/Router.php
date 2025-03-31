<?php

namespace App\Infrastructure\Routing;

class Router {
    function addRoute(string $method,string $path, callable $action){
        $this->routes[$method][$path]=$action;
        return $this;
    }

    function dispatch(Request $request){
        $method=$request->getMethod();
        $path=$request->getPath();
        if(isset($this->routes[$method][$path])){       
            call_user_func($this->routes[$method][$path]);
        }else{
            http_response_code(404);
            echo "Route not found";
        }
    }
}
