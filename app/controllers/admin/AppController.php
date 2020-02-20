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

}