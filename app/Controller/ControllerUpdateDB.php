<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
// use CzProject\GitPhp\Git;
use App\Model\ModelManageDB;

class ControllerUpdateDB extends ClassRender implements InterfaceView
{
    public function __construct()
    {
        parent::__construct();
        $this->update_database();
    }

    public function update_database()
    {
        $project = $_POST['project'];

        $model_manage_db = new ModelManageDB();

        if ($project == 0) {
            $db = 'roguitar_olimppius';
            $dbms_schema = 'C:\laragon\www\olimppius\database\roguitar_olimppius.sql';
        } elseif ($project == 1) {
            $db = 'zuump';
            $dbms_schema = 'C:\laragon\www\zuump\database\zuump.sql';
        } 
        /*
        elseif ($project == 2) {
            $db = 'laco_moretto';
            $dbms_schema = 'C:\laragon\www\lacoprofissional2\database\laco_moretto.sql';
        }
        */

        $update_db = $model_manage_db->updateCurrentDB($db, $dbms_schema);

        echo json_encode($update_db);
    }

}