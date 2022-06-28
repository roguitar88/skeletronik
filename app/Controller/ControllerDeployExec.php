<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use CzProject\GitPhp\Git;

class ControllerDeployExec extends ClassRender implements InterfaceView
{
    // Notice: This is using a lib that you can find at https://packagist.org/packages/czproject/git-php. This project already comes with that lib (that is installed via composer).
    // In production, unfortunately folders and files should be set to 'www-data', as far as 'owner/group' is concerned. Anyhow, I don't recommend it. There's an alternative solution you can get via http://phpseclib.sourceforge.net/ or you can contact me via +5562982570993, where you can get the ready whole project
    // Don't forget to run 'git pull' in your server
    public function __construct()
    {
        parent::__construct();
        // $this->olimppius_deploy();
        $this->zuump_deploy();
    }

    public function zuump_deploy()
    {
        try {
            if (empty($_POST)) {
                $result = array(
                    "success" => false,
                    "error" => "Permission error"
                );
            } else {
                $commit_message = $_POST['commit-message'];
                
                // https://packagist.org/packages/czproject/git-php
                // From localhost/development
                $git = new Git;

                $repo = $git->open('C:\laragon\www\zuump');

                $repo->pull(); // ['origin', 'main']
                $repo->checkout('development');
                $repo->pull(['origin', 'main']);
                $repo->addAllChanges();
                $repo->commit($commit_message);
                $repo->push(['origin', 'development']);
                $repo->checkout('main');
                $repo->merge('development');
                $repo->push(['origin', 'main']);

                $result = array(
                    "success" => true,
                    "msg" => 'Deploy via Git accomplished successfully'
                );
            }
        } catch (\Exception $e) {
            $result = array(
                "success" => false,
                "error" => "Error! ".$e->getMessage()
            );
        }

        echo json_encode($result);
    }

    public function olimppius_deploy()
    {
        /*
        try {
            if (empty($_POST)) {
                $result = array(
                    "success" => false,
                    "error" => "Permission error",
                );
            } else {
                $commit_message = $_POST['commit-message'];
                
                // https://packagist.org/packages/czproject/git-php
                // From localhost/development
                $git = new Git;

                $repo = $git->open('C:\laragon\www\olimppius');

                $repo->pull(); // ['origin', 'main']
                $repo->addAllChanges();
                $repo->commit($commit_message);
                // $repo->push();
                $repo->push(['origin', 'main']);

                $result = array(
                    "success" => true,
                    "msg" => 'Deploy via Git accomplished successfully'
                );
            }
        } catch (\Exception $e) {
            $result = array(
                "success" => false,
                "error" => "Error! ".$e->getMessage(),
            );
        }

        return json_encode($result);       
        */ 
    }
}