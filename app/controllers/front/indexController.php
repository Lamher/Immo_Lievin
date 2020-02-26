<?php

namespace App\Controllers\Front;


use App\Controllers\Front\AppController;

use App\Models\User;
use App\models\Address;

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
    public function inscriptionAction()
    {
        $registrationAddress = new Address();
        $registrationtUser = new User();
        // Au submit
        if (isset($_POST['registration'])) {
            // Création du record address
            $dataAddress = [
                "streetNumber" => $this->post('streetNumber'),
                "streetName" => $this->post('streetName'),
                "postalCode" => $this->post('postalCode'),
                "city" => $this->post('city'),
                "country" => $this->post('country')
            ];
            $registrationAddress->insert($dataAddress);

            // Création du record user
            $dataUser = ["name" => $this->post('name'), "surname" => $this->post('surname'), "mail" => $this->post('mail'), "password" => password_hash($_POST['password'], PASSWORD_DEFAULT), "idAddress" => $registrationAddress->_LastInsertId];
            $registrationtUser->insert($dataUser);


        }
        $this->render('index.inscription');

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
    public function cguAction()
    {
        $this->render('index.cgu');
    }
    public function mentionsLegalesAction()
    {
        $this->render('index.mentionsLegales');
    }
    public function proposerBienAction()
    {
        $this->render('index.proposerBien');
    }


    public function notreAgenceAction()
    {
        $this->render('index/notreAgence');
    }
    public function detailAnnonceAction()
    {
        $this->render('index/detailAnnonce');
    }
}