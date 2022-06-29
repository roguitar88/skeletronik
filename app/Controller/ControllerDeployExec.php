<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use CzProject\GitPhp\Git;


class ControllerDeployExec extends ClassRender implements InterfaceView
{
    // Notice: This is using a lib that you can find at https://packagist.org/packages/czproject/git-php. This project already comes with that lib (that is installed via composer).
    // In production, unfortunately folders and files should be degraded to 'www-data', as far as 'owner/group' is concerned. Anyhow, I don't recommend it. There's an alternative solution you can get via http://phpseclib.sourceforge.net/ and that you can find here in this project (in the directory src/Includes/Net)
    // Don't forget to run 'git pull' in your server or you can use the function git_pull_in_server() to automate it.
    public function __construct()
    {
        parent::__construct();
        // $this->olimppius_deploy();
        $this->zuump_deploy();
        // $this->git_pull_in_server();
    }

    // You can create a method for each of your projects
    // Zuump project
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

                $repo->checkout('main');
                $repo->pull(); // ['origin', 'main']
                $repo->checkout('development');
                $repo->pull(['origin', 'main']);
                $repo->addAllChanges();
                $repo->commit($commit_message);
                $repo->push(['origin', 'development']);
                $repo->checkout('main');
                $repo->merge('development');
                $repo->push(['origin', 'main']);
                // $this->git_pull_in_server();

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

    // Olimppi.us project
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

    public function git_pull_in_server()
    {
        // Sources: http://phpseclib.sourceforge.net/ and https://stackoverflow.com/questions/1598231/how-to-run-php-exec-as-root
        include(__DIR__ . "./../../src/Includes/Net/SSH2.php");
        $ssh = new \Net_SSH2('vmi759277');
        $ssh->login('admin', 'mariamole123');

        $ssh->read('[prompt]');
        $ssh->write("cd /var/www/html/zuump && sudo git pull\n");
        $ssh->read('Password:');
        $ssh->write("mariamole123\n");
        // echo $ssh->read('[prompt]');
    }
}