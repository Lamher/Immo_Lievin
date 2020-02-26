<?php

namespace App\Controllers\Front;

use Core\Controller;

class AppController extends Controller
{
    protected $appName = 'front';



    public function __construct()
    {
        /**
         * Dans le constructeur on push des elements specifique à notre module
         */
        $this->viewPath = PATH_VIEWS .   $this->appName;
        //Chacun de ses elements peut etre surchargé dans vos methodeAction
        $element['header'] = $this->buildHeader();
        $element['footer'] = $this->buildFooter();
        $element['navigation'] = $this->buildNavigation();
        $element['title'] = 'test titre';

        $this->addContentToView($element);

        parent::__construct();
    }

    public function buildHeader()
    {
        return $this->renderView('partial.header');
    }
    public function buildNavigation()
    {
        return $this->renderView('partial.navigation');
    }

    public function buildFooter()
    {
        return $this->renderView('partial.footer');
    }

}