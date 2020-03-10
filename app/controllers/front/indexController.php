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
use GuzzleHttp\Client;


class IndexController extends AppController
{



    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $indexProperties = new Property();
        if (isset($_POST['favorite']) && isset($_SESSION['userId'])) {
            $newFav = new Favorite();
            $newFav->setAsFavorite($this->post('id'), $_SESSION['userId']);
        }
        $cards = $indexProperties->selectPropertyByIndexTop();
        $tab = ['lists' => $cards];
        $this->render('index.index', $tab);
    }

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
        if (isset($_POST['favorite']) && isset($_SESSION['userId'])) {
            $newFav = new Favorite();
            $newFav->setAsFavorite($this->post('id'), $_SESSION['userId']);
        }

        $propertyList->setType($param);
        $result = $propertyList->selectPropertyByType();
        $tab = ['lists' => $result];
        $this->render('index.listeAnnonces', $tab);
    }

    public function ajaxListeAnnoncesAction()
    {
        $propertyList = new Property();
        if (isset($_POST['favorite']) && isset($_SESSION['userId'])) {
            $newFav = new Favorite();
            $newFav->setAsFavorite($this->post('id'), $_SESSION['userId']);
        }
        $ajax = $propertyList->selectPropertyByFilter($_POST['type'], $_POST['city'], $_POST['category'], $_POST['reference'], $_POST['minPrice'], $_POST['maxPrice']);
        $tab = ['lists' => $ajax];
        echo $this->renderViewAjax('index.listeAnnonces', $tab);
    }

    public function detailAnnonceAction($params)
    {
        $propertyDetail = new Property();
        $addressDetail = new Address();
        $imagesDetail = new Image();
        if (isset($_POST['favorite']) && isset($_SESSION['userId'])) {
            $newFav = new Favorite();
            $newFav->setAsFavorite($params, $_SESSION['userId']);
        }
        $propertyDetail->setId($params);
        $propertyDetail->selectPropertyById();
        $addressDetail->setId($propertyDetail->getIdAddress());
        $addressDetail->selectAddressByPropertyId();
        $images = $imagesDetail->selectImagesByPropertyId($params);


        $infoDetails = [
            'id' => $params,
            'name' => $propertyDetail->getName(),
            'reference' => $propertyDetail->getReference(),
            'type' => $propertyDetail->getType(),
            'price' => $propertyDetail->getPrice(),
            'surfaceArea' => $propertyDetail->getSurfaceArea(),
            'rooms' => $propertyDetail->getRooms(),
            'bedrooms' => $propertyDetail->getBedrooms(),
            'energyClass' => $propertyDetail->getEnergyClass(),
            'indexTop' => $propertyDetail->getIndexTop(),
            'description' => $propertyDetail->getDescription(),
            'visible' => $propertyDetail->getVisible(),
            'category' => $propertyDetail->getIdCategory(),
            'streetNumber' => $addressDetail->getStreetNumber(),
            'streetName' => $addressDetail->getStreetName(),
            'postalCode' => $addressDetail->getPostalCode(),
            'city' => $addressDetail->getCity(),
            'country' => $addressDetail->getCountry(),
            'category' => $propertyDetail->getIdCategory(),
            'images' => $images
        ];
        $tab = ['infos' => $infoDetails];
        $this->render('index.detailAnnonce', $tab);
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
                        header('Location:' . BASE_URI . 'index/index');
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

    public function testAction()
    {
        // echo "<form action='' method='POST'><label for='id'>Bien a retourner : </label><input type='number' name='id'><button type='submit' name='submit'>Resultat</button><br><form action='' method='POST'><label for='id'>Retourner tous les biens </label><button type='submit' name='submitAll'>Resultat</button><br>";
        // $post = array(
        //     'streetNumber' => '6',
        //     'streetName' => 'rue test',
        //     'postalCode' => '62840',
        //     'city' => 'laventie',
        //     'country' => 'france',
        //     'name' => 'Maison',
        //     'reference' => 'M0000008',
        //     'type' => 'Vente',
        //     'price' => '684654654',
        //     'surfaceArea' => '88',
        //     'rooms' => '5',
        //     'bedrooms' => '3',
        //     'energyClass' => 'A',
        //     'indexTop' => '0',
        //     'description' => 'blablabla',
        //     'visible' => 1,
        //     'idCategory' => 1,
        //     'idUser' => 1
        // );


        // Methode POST
        // echo 'test';
        // $url = "http://localhost/Immo_Lievin/public/Api/properties";
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_USERPWD, "test:1234");
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        // $result = curl_exec($ch);

        // curl_close($ch);
        // echo $result;




        // Methode GET
        if (isset($_POST['submit']) && $_POST['id'] < 7) {
            
            
            
            
            
            
            
            
            // SETUP REQUEST /W CURL
            // $url = "http://localhost/Immo_Lievin/public/Api/property/" . $_POST['id'];
            // $ch = curl_init($url);
            // curl_setopt($ch, CURLOPT_USERPWD, "test:1234");
            // curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            // $result = curl_exec($ch);
            // curl_close($ch);
        }

        // if (isset($_POST['submitAll'])) {
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
            $client = new Client();
            $response = $client->get('http://localhost/Immo_Lievin/public/Api/properties/');
            $body = $response->getBody();
            echo $body;
            
            
            
            
            
            
            // SETUP REQUEST /W CURL
            // $url = "http://localhost/Immo_Lievin/public/Api/properties";
            // $ch = curl_init($url);
            // curl_setopt($ch, CURLOPT_USERPWD, "test:1234");
            // curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            // $result = curl_exec($ch);
            // curl_close($ch);
        // }
    }



    public function notreAgenceAction()
    {
        $this->render('index/notreAgence');
    }
}
