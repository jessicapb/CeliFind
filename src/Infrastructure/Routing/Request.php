<?php

namespace App\Infrastructure\Routing;

class Request {
    private string $method;
    private string $path;

    function __construct(){
        $this->method=$_SERVER['REQUEST_METHOD'];
        $this->path=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }

    public function getMethod(){
        return $this->method;
    }

    public function getPath(){
        return $this->path;
    }
}
