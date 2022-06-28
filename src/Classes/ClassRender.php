<?php
// declare(strict_types=1);
namespace Src\Classes;
//use App\Model\ModelUser;
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

class ClassRender
{
    #Properties or attributes for the users
    private $dir;  //Optional
    private $pageTitle;
    private $metaDescription;
    private $metaKeywords;
    // private ?string $assets = null;
    private $assets;
    private $head;
    protected $model;
    
    public function __construct()
    {
        /*
        $this->checkSession();
        $this->logout();
        */
    }

    #Rendering the layout
    public function renderLayout()
    {
        include_once(DIRREQ."app/view/layouts/main.php");
    }

    #Adding features to the header or nav
    public function addNav()
    {
        if (file_exists(DIRREQ."app/view/layouts/partials/nav.php")) {
            include(DIRREQ."app/view/layouts/partials/nav.php");
        }
    }

    #Adding features to the content of each page
    public function addContent()
    {
        if (file_exists(DIRREQ."app/view/{$this->getDir()}")) {
            include(DIRREQ."app/view/{$this->getDir()}");
        }
    }

    #Adding features to the footer
    public function addFooter()
    {
        if (file_exists(DIRREQ."app/view/layouts/partials/footer.php")) {
            include(DIRREQ."app/view/layouts/partials/footer.php");
        }
    }

    #Sending emails through PHPMailer
    public function mailUser($email, $name, $subject, $message)
    {
        //require(DIRREQ.'src/vendor/autoload.php');
        
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = MAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_USERNAME;
            $mail->Password   = MAIL_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = MAIL_PORT;
            
            //Recipients
            $mail->setFrom(ST_EMAIL, 'Assunto do e-mail');
            
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);

            $mail->addAddress($email, $name);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = strip_tags($message);
            $mail->send();
        } catch (\Exception $e) {
            echo '<script>alert("Erro ao enviar email: ' . $mail->ErrorInfo . '");</script>';
        }
    }

    /*
    public function checkSession()
    {
        //Check if user is logged in. Once he is logged in, you just retrieve his data
        if (isset($_SESSION['email'])) {
            ...
        }
    }

    public function protectPage()
    {
        if (!isset($_SESSION['email'])) {
            header('Location: ' . DIRPAGE . 'login');
            exit;
        }
    }

    public function skipPageIfLogged()
    {
        if (isset($_SESSION['email'])) {
            header('Location: ' . DIRPAGE);
            exit;
        }
    }

    public function logout()
    {
        if (isset($_POST['logout'])) {
            if (isset($_SESSION['email'])) {
                session_destroy();
                //header('Location: ' . $_SERVER['HTTP_REFERER']);
                header('Location: ' . DIRPAGE . 'login');
                exit;
            } else {
                header('Location: ' . DIRPAGE . 'login');
                exit;
            }
        }
    }
    */

    #Special Methods
    function getDir()
    {
        return $this->dir;
    }

    function setDir($dir)
    {
        $this->dir = $dir;
    }

    function getPageTitle()
    {
        return $this->pageTitle;
    }

    function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    function getMetaDescription()
    {
        return $this->metaDescription;
    }

    function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    }

    function getHead()
    {
        return $this->head;
    }

    function setHead($head)
    {
        $this->head = $head;
    }

    function getAssets()
    {
        return $this->assets;
    }

    function setAssets($assets)
    {
        $this->assets = $assets;
    }

    function getModel()
    {
        return $this->model;
    }

    function setModel($model)
    {
        $this->model = $model;
    }

}