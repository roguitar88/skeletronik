<?php
namespace Src\Classes;

use Src\Traits\TraitUrlParser;

class ClassRoutes
{

    use TraitUrlParser;

    private $route;

    #Method for returning the route
    public function getRoute()
    {
        $url = $this->parseUrl();
        $i = $url[0];

        #Here you set the routes according to the controllers
        $this->route = array(
            "" => "ControllerHome",
            "home" => "ControllerHome",
            "login" => "ControllerLogin",
            "register" => "ControllerRegister",
            "deploy" => "ControllerDeploy",
            "deploy-exec" => "ControllerDeployExec"
        );

        if (array_key_exists($i, $this->route)) {
            if (file_exists(DIRREQ."app/Controller/{$this->route[$i]}.php")) {
                return $this->route[$i];               
            } else {
                return "ControllerHome";
            }
        } else {
            return "Controller404";
        }

    }

}