<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Message;

class AppController extends Controller
{

    protected $appName = 'admin';
    protected $token;
    protected $token_time;


    public function __construct()
    {
        if (empty($_SESSION['token']) || empty($_SESSION['token_time'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
            $_SESSION['token_time'] = time();
        }
        $this->token = $_SESSION['token'];
        $this->token_time = $_SESSION['token_time'];



        if (!isset($_SESSION['userId']) || empty($_SESSION['userId']) || !isset($_SESSION['userRole']) || $_SESSION['userRole'] != 'admin') {
            header('Location:' . BASE_URI . 'index/connexion');
        } else {

            /**
             * Dans le constructeur on push des elements specifique à notre module
             */
            $this->viewPath = PATH_VIEWS .   $this->appName;
            //Chacun de ses elements peut etre surchargé dans vos methodeAction
            $element['header'] = $this->buildHeader();
            $element['navFullscreen'] = $this->buildNavFullscreen();
            $element['navMobile'] = $this->buildNavMobile();
            $element['title'] = "Panneau d'administration";
            $element['description'] = 'Panneau d\'administration';

            $this->addContentToView($element);

            parent::__construct();
        }
    }

    public function checkCSRF()
    {
        if (!empty($_POST['token'])) {
            if (!hash_equals($this->token, $_POST['token']) ||  strtotime($this->token_time) > strtotime("-15 minutes")) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function buildHeader()
    {
        $messages = new Message();
        $messages->countUnseen();
        $count =  $messages->getCount();
        $tab = ['count' => $count];
        return $this->renderView('partial.header', $tab);
    }

    public function buildNavFullscreen()
    {
        return $this->renderView('partial.navFullscreen');
    }

    public function buildNavMobile()
    {
        return $this->renderView('partial.navMobile');
    }
}
