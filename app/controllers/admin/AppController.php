<?php 

namespace App\Controllers\Admin;

use Core\Controller;

class AppController extends Controller
{

    protected $appName = 'admin';
   

    public function __construct()
    {
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
        return $this->renderView('partial.header');
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