<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use CzProject\GitPhp\Git;
use phpseclib3\Net\SSH2;
use phpseclib3\Crypt\PublicKeyLoader;

class ControllerDeployExec extends ClassRender implements InterfaceView
{
    // Notice: This is using a lib that you can find at https://packagist.org/packages/czproject/git-php. This project already comes with that lib (that is installed via composer).
    // In production, unfortunately folders and files should be degraded to 'www-data', as far as 'owner/group' is concerned. Anyhow, I don't recommend it. There's an alternative solution you can get via http://phpseclib.sourceforge.net/ or via https://phpseclib.com/docs/connect (this is already one of the dependencies that will be automatically generated via composer).
    // Don't forget to run 'git pull' in your server or you can use the function git_pull_in_server() to automate it. The downside is that it can take longer.
    public function __construct()
    {
        parent::__construct();
        $this->deploy();
    }

    public function deploy()
    {
        try {
            if (empty($_POST)) {
                $result = array(
                    "success" => false,
                    "error" => "Permission error"
                );
            } else {
                $commit_message = $_POST['commit-message'];
                $project = $_POST['project'];

                // https://packagist.org/packages/czproject/git-php
                // From localhost/development
                $git = new Git;

                if ($project == 0) { // Olimppi.us
                    $repo = $git->open('C:\laragon\www\olimppius');

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
                    $this->git_pull_in_server($project);
                    $this->git_pull_in_server_2($project);
                } elseif ($project == 1) { // Zuump
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
                    $this->git_pull_in_server($project);
                } 
                /*
                elseif ($project == 2) { // Lacoprofissional.tv
                    $repo = $git->open('C:\laragon\www\lacoprofissional2');

                    $repo->addAllChanges();
                    $repo->commit($commit_message);
                    $repo->push(['origin', 'main']);
                    $this->git_pull_in_server($project);
                }
                */

                $result = array(
                    "success" => true,
                    "msg" => 'Deploy via Git accomplished successfully'
                );
            }
        } catch (\Exception $e) {
            $result = array(
                "success" => false,
                "error" => "Error! No changes/updates detected. ".$e->getMessage()
            );
        }

        echo json_encode($result);
    }

    // Contabo server
    public function git_pull_in_server($project)
    {
        // Sources: http://phpseclib.sourceforge.net/, https://phpseclib.com/docs/auth and https://stackoverflow.com/questions/1598231/how-to-run-php-exec-as-root
        $ssh = new SSH2('111.111.111.11');
        $ssh->login('admin', 'mariamole69');

        $ssh->read('[prompt]');
        if ($project == 0) { // Olimppi.us
            $ssh->write("cd /var/www/html/olimppius && sudo git pull && sudo php artisan route:cache\n");
        } elseif ($project == 1) { // Zuump
            $ssh->write("cd /var/www/html/zuump && sudo git pull && sudo php artisan route:cache\n"); // in case you're using Laravel
        } 
        /*
        elseif ($project == 2) { // Lacoprofissional.tv
            $ssh->write("cd /var/www/html/lacoprofissional2 && sudo git pull\n");
        }
        */
        $ssh->read('[prompt]');
    }
    
    // Oracle server
    public function git_pull_in_server_2($project)
    {
        $key = PublicKeyLoader::load(file_get_contents('C:\Users\User\Downloads\private.ppk'));

        $ssh = new SSH2('222.22.22.22');
        $ssh->login('ubuntu', $key);

        $ssh->read('[prompt]');
        if ($project == 0) { // Olimppi.us
            $ssh->write("cd /var/www/html/olimppius && sudo git pull && sudo php artisan route:cache\n");
        } elseif ($project == 1) { // Zuump
            $ssh->write("cd /var/www/html/zuump && sudo git pull && sudo php artisan route:cache\n"); // in case you're using Laravel
        } 
        $ssh->read('[prompt]');
    }
}