<?php

namespace App\Controllers\Front;


use App\Controllers\Front\AppController;

//use App\Models\Users;

class IndexController extends AppController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {

        //Ici pour vous montrer je surcharge le title qui se trouve dans
        // le constructeur parent
        $element['title'] = 'changement';
        $this->addContentToView($element);

        //Dans un tableau la variable "name" qui se trouve
        // dans la vue index de mon module "front"
        $tableauPourLaVue = ['name' => 'undeundeu'];

        $this->render('index.index', $tableauPourLaVue);

    }

    /**
     * Juste une methode pour tester
     * d'afficher la liste des utilisateur sur l'accueil
     */
    public function connexionAction()
    {
        $this->render('index.connexion');
    }
    public function contactAction()
    {
        $this->render('index.contact');
    }

    public function listeAnnoncesAction()
    {
        $this->render('index.listeAnnonces');
    }

    public function detailAnnoncesAction()
    {
        $this->render('index.detailAnnonces');
    }
}