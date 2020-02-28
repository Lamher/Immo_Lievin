<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Message;

class AppController extends Controller
{

    protected $appName = 'admin';


    public function __construct()
    {
        // if (!isset($_SESSION['userID']) || empty($_SESSION['userID']) || !isset($_SESSION['userRole']) || $_SESSION['userRole'] != 'Admin') {
        //     header('Location:' . BASE_URI . 'index/connexion');
        // }

        /**
         * Dans le constructeur on push des elements specifique à notre module
         */
        $this->viewPath = PATH_VIEWS .   $this->appName;
        //Chacun de ses elements peut etre surchargé dans vos methodeAction
        $element['header'] = $this->buildHeader();
        $element['navFullscreen'] = $this->buildNavFullscreen();
        $element['navMobile'] = $this->buildNavMobile();
        $element['title'] = "Panneau d'administration";
        $element['description'] = 'test';

        $this->addContentToView($element);

        parent::__construct();
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
