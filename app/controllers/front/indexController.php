<?php

namespace App\Controllers\Front;


use App\Controllers\Front\AppController;

use App\Models\User;
use App\Models\Address;
use App\Models\Favorite;
use App\Models\Image;
use App\Models\Message;
use App\Models\Property;
use Core\Upload;


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

        if (isset($_POST['login'])) {
            $User = new User();
            $User->setMailConnexion($this->post('mail'));
            if (!empty($this->post('mail')) && $User->isValid()) {
                $User->selectUserByMail();
                if (!password_verify($this->post('password'), $User->getPassword())) {
                    //Login incorrect -> message+redirection Login
                    $connexionErrors = $User->getErrorMessage();
                    $errors = ['errors' => $connexionErrors];
                    $this->render('index.connexion', $errors);
                } else {
                    $this->connect($User->getId());
                }
            } else {
                $connexionErrors = $User->getErrorMessage();
                $errors = ['errors' => $connexionErrors];
                $this->render('index.connexion', $errors);
            }
        }
        $this->render('index.connexion');
    }

    // Methode pour connecter l'utilisateur
    private function connect($id)
    {
        $user = new User();
        $user->setId($id);
        $user->selectUserById();
        if ($user->getMail() !== '') {
            $_SESSION['userName'] = $user->getName();
            $_SESSION['userMail'] = $user->getMail();
            $_SESSION['userRole'] = $user->getRole();
            $_SESSION['userId'] = $user->getId();

            header('Location:' . BASE_URI . 'index/index');
        }
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
        $message = new Message();
        if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
            header('Location:' . BASE_URI . 'index/connexion');
        } else {
            if (isset($_POST['send'])) {
                if ($this->checkCSRF()) {
                    $message->setObject($this->post('object'))
                        ->setContent($this->post('content'));
                    if ($message->isValid()) {
                        $message->insertMessage($_SESSION['userId']);
                        $this->render('index.index');
                    } else {
                        $Errors = $message->getErrorMessage();
                        $errorlist = ['errors' => $Errors];
                        $this->render('index.contact', $errorlist);
                    }
                } else {
                    echo 'Expiration du formulaire.';
                }
            }
            $this->render('index.contact');
        }
    }

    public function listeAnnoncesAction($param)
    {
        $propertyList = new Property();
        $imageList = new Image();
        $imageList->setName($param);
        $propertyList->setType($param);
        $result = $propertyList->selectPropertiesByType();
        // $img = $imageList->selectImagesByPropertyId();
        var_dump($img);
        $tab = ['infos' => $result];
        $card = ['infos' => $img];
        $this->render('index.listeAnnonces', $tab, $card);
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
        $insertAddress = new Address();
        $insertProperty = new Property();
        $insertImage = new Image();
        $upload = new Upload();
        $upload->setPath(BASE_IMG_PROPERTIES)
            ->setMaxSize(25)
            ->setValidFile(['jpg' => 'image/jpeg', 'png' => 'image/png', 'jfif' => 'image/jfif']);
        // Au clic sur le submit
        if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
            header('Location:' . BASE_URI . 'index/connexion');
        } else {
            if (isset($_POST['add-property'])) {
                if ($this->checkCSRF()) {
                    // Validation des inputs addresse
                    $insertAddress->setStreetNumber($this->post('streetNumber'))
                        ->setStreetName($this->post('streetName'))
                        ->setPostalCode($this->post('postalCode'))
                        ->setCity($this->post('city'))
                        ->setCountry($this->post('country'));
                    // Validation des inputs bien
                    $insertProperty->setName($this->post('name'))
                        ->setReference($this->post('reference'))
                        ->setType($this->post('type'))
                        ->setPrice($this->post('price'))
                        ->setSurfaceArea($this->post('surfaceArea'))
                        ->setRooms($this->post('rooms'))
                        ->setBedrooms($this->post('bedrooms'))
                        ->setEnergyClass($this->post('energyClass'))
                        ->setIndexTop(0)
                        ->setDescription($this->post('description'))
                        ->setVisible(0)
                        ->setIdCategory($this->post('category'))
                        ->setIdUser($_SESSION['userId']);
                    // Si validation pour addresse + bien, insert
                    if ($insertAddress->isValid() && $insertProperty->isValid()) {
                        $insertAddress->insertAddress();
                        $insertProperty->insertProperty($insertAddress->_LastInsertId);
                        // Puis upload des images si présentes, avec insert dans la table seulement si succès de l'upload
                        if (isset($_FILES['image1'])) {
                            $upload->setFileName($this->post('reference') . "_1.png")
                                ->upload("image1");
                            if ($upload->getSuccess()) {
                                $insertImage->createImage($this->post('reference') . "_1.png", 1, $insertProperty->_LastInsertId);
                            }
                        }
                        if (isset($_FILES['image2'])) {
                            $upload->setFileName($this->post('reference') . "_2.png")
                                ->upload("image2");
                            if ($upload->getSuccess()) {
                                $insertImage->createImage($this->post('reference') . "_2.png", 1, $insertProperty->_LastInsertId);
                            }
                        }
                        if (isset($_FILES['image3'])) {
                            $upload->setFileName($this->post('reference') . "_3.png")
                                ->upload("image3");
                            if ($upload->getSuccess()) {
                                $insertImage->createImage($this->post('reference') . "_3.png", 1, $insertProperty->_LastInsertId);
                            }
                        }
                        if (!$upload->isValid()) {
                            $imageErrors = $upload->getErrorMessage();
                        }
                        // Puis redirection
                        $this->render('index.index');
                    } else {
                        // Si erreurs dans la validation
                        $propertyErrors = $insertProperty->getErrorMessage();
                        $addressErrors = $insertAddress->getErrorMessage();
                        $errorlist = array_merge($propertyErrors, $addressErrors);
                        $errors = ['errors' => $errorlist];
                        $this->render('index.proposerBien', $errors);
                    }
                } else {
                    echo 'Expiration du formulaire.';
                }
            }
            $this->render('index.proposerBien');
        }
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
