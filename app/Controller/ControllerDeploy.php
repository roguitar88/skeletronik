<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerDeploy extends ClassRender implements InterfaceView
{
    public function __construct()
    {
        parent::__construct();
        //$this->logout();
        $this->setPageTitle("MVC - Deploy com Git");
        $this->setMetaDescription("Deploy com Git");
        $this->setMetaKeywords("MVC, Framework, Desenvolvimento Web, POO, PHP, Deploy, Git");
        $this->setDir("deploy.php");
        $this->setAssets('
<script src="'.DIRJS.'deploy.js"></script>
        ');
        //$this->setHead($foo);
        $this->renderLayout();
    }
}