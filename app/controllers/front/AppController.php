<?php

namespace App\Controllers\Front;

use Core\Controller;

class AppController extends Controller
{
    protected $appName = 'front';
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
        /**
         * Dans le constructeur on push des elements specifique à notre module
         */
        $this->viewPath = PATH_VIEWS .   $this->appName;
        //Chacun de ses elements peut etre surchargé dans vos methodeAction
        $element['header'] = $this->buildHeader();
        $element['footer'] = $this->buildFooter();
        $element['navigation'] = $this->buildNavigation();
        $element['filter'] = $this->buildFilter();
        $element['title'] = 'Immo Lievin';

        $this->addContentToView($element);

        parent::__construct();
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
        return $this->renderView('partial.header');
    }
    public function buildNavigation()
    {
        return $this->renderView('partial.navigation');
    }
    public function buildFilter()
    {
        return $this->renderView('partial.filter');
    }

    public function buildFooter()
    {
        return $this->renderView('partial.footer');
    }

}