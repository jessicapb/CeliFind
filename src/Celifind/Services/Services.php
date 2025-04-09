<?php 
namespace App\Celifind\Services;

class Services{
    private array $services=[];
    private array $instances=[];
        
    public function addServices(string $service, callable $def){
        $this->services[$service]=$def;
    }

    public function getService(string $name){
        if(!isset($this->services[$name])){
            throw new \Exception("Service $name not found");
        }
        if(!isset($this->instances[$name])){
            $this->instances[$name]=$this->services[$name]($this);
        }
        return $this->instances[$name];
    }

    public function hasService($name){
        return isset($this->services[$name]);
    }
}