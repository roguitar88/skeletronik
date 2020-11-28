<?php
namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes
{
    #Attributes
    private $method;
    public $param = [];
    private $obj;

    protected function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    protected function getParam()
    {
        return $this->param;
    }

    public function setParam($param)
    {
        $this->param = $param;
    }

    #Construct Method
    public function __construct()
    {
        self::addController();  //$this->addController();
    }

    #Controller Addition Method
    private function addController()
    {
        $routeController = $this->getRoute();
        $nameSpace = "App\\Controller\\{$routeController}";
        $this->obj = new $nameSpace;
        
        if (isset($this->parseUrl()[1])) {
            self::addMethod();   //$this->addMethod();
        }
    }

    #Controller Method Addition Method
    private function addMethod()
    {
        if (method_exists($this->obj, $this->parseUrl()[1])) {
            $this->setMethod("{$this->parseUrl()[1]}");
            self::addParam();   //$this->addParam();
            call_user_func_array(
                [
                    $this->obj,
                    $this->getMethod()
                ],
                $this->getParam()
            );
        }
    }

    #Controller Parameter Addition Method
    public function addParam()
    {
        $countArray = count($this->parseUrl());
        
        if ($countArray > 2) {
            foreach ($this->parseUrl() as $key => $value) {
                if ($key > 1) {
                    $this->setParam($this->param += [$key => $value]);
                }
            }

        }
        //var_dump($this->getParam());

    }

}