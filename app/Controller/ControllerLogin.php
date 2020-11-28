<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerLogin extends ClassRender implements InterfaceView
{
    public function __construct()
    {
        parent::__construct();
        //$this->logout();
        $this->setPageTitle("MVC - Página Inicial");
        $this->setMetaDescription("Esta é apenas uma página de teste");
        $this->setMetaKeywords("MVC, Framework, Desenvolvimento Web, POO, PHP");
        $this->setDir("login.php");
        //$this->setHead($foo);
        $this->renderLayout();
    }
}