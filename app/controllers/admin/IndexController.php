<?php


namespace App\Controllers\Admin;

use App\Controllers\Admin\AppController;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;
use App\Models\Address;
use App\Models\Property;
use App\Models\Image;
use App\Models\Message;
use Core\Upload;

class IndexController extends AppController
{

    public function indexAction()
    {
        $this->render('index.dashboard');
    }

    public function user_listAction()
    {
        $element['title'] = "Liste des utilisateurs";
        $this->addContentToView($element);

        $users = new User();

        if (isset($_POST['delete'])) {
            $users->deleteUser($this->post('id'));
        }
        $lists = $users->selectAll();
        $tab = ['lists' => $lists];

        $this->render('index.user_list', $tab);
    }

    public function user_createAction()
    {
        $element['title'] = "Créer un utilisateur";
        $this->addContentToView($element);
        $insertAddress = new Address();
        $insertUser = new User();


        // Au submit
        if (isset($_POST['add-user'])) {
            // Verifier la présence d'un token
            if ($this->checkCSRF()) {


                // Validation des champs
                $insertAddress->setStreetNumber($this->post('streetNumber'))
                    ->setStreetName($this->post('streetName'))
                    ->setPostalCode($this->post('postalCode'))
                    ->setCity($this->post('city'))
                    ->setCountry($this->post('country'));
                $insertUser->setName($this->post('name'))
                    ->setSurname($this->post('surname'))
                    ->setMail($this->post('mail'))
                    ->setHashedPassword($_POST['password']); // le hash est fait par le validator en cas de succès
                // Si tous les champs sont valides, insertion dans la table et redirection
                if ($insertAddress->isValid() && $insertUser->isValid()) {
                    $insertAddress->insertAddress();
                    $insertUser->insertUser($insertAddress->_LastInsertId);

                    $users = new User();
                    $lists = $users->selectAll();
                    $tab = ['lists' => $lists];
                    $this->render('index.user_list', $tab);
                } else {
                    // récupération des messages d'erreur
                    $userErrors = $insertUser->getErrorMessage();
                    $addressErrors = $insertAddress->getErrorMessage();
                    $errorlist = array_merge($userErrors, $addressErrors);
                    $errors = ['errors' => $errorlist];
                    $this->render('index.user_create', $errors);
                }
            } else {
                echo 'Expiration du formulaire.';
            }
        }

        $this->render('index.user_create');
    }

    public function user_updateAction($params)
    {
        $element['title'] = "Modifier un utilisateur";
        $this->addContentToView($element);
        // Update users and addresses tables on submit
        $userUpdate = new User();
        $userUpdate->setId($params);
        $userUpdate->selectUserById();
        $addressUpdate = new Address();
        $addressUpdate->setId($userUpdate->getIdAddress());
        $addressUpdate->selectAddressByUserId();
        if (isset($_POST['update-user'])) {
            if ($this->checkCSRF()) {
                $userUpdate->setName($this->post('name'))
                    ->setSurname($this->post('surname'))
                    ->setMail($this->post('mail'));
                if ($_POST['password'] != $userUpdate->getPassword()) {
                    $userUpdate->setHashedPassword($_POST['password']);
                }
                $addressUpdate->setStreetNumber($this->post('streetNumber'))
                    ->setStreetName($this->post('streetName'))
                    ->setPostalCode($this->post('postalCode'))
                    ->setCity($this->post('city'))
                    ->setCountry($this->post('country'));
                if ($userUpdate->isValid() && $addressUpdate->isValid()) {
                    $userUpdate->updateUser();
                    $addressUpdate->updateAddress();

                    //Redirecting to user_list
                    $users = new User();
                    $lists = $users->selectAll();
                    $tab = ['lists' => $lists];
                    $this->render('index.user_list', $tab);
                }
            } else {
                echo 'Expiration du formulaire.';
            }
        }
        $userErrors = $userUpdate->getErrorMessage();
        $addressErrors = $addressUpdate->getErrorMessage();
        $errorlist = array_merge($userErrors, $addressErrors);
        // Select the values of each inputs depending of the user id set as parameter in the URI
        $updateInfos = ['infos' => [
            'id' => $params,
            'name' => $userUpdate->getName(),
            'surname' => $userUpdate->getSurname(),
            'mail' => $userUpdate->getMail(),
            'password' => $userUpdate->getPassword(),
            'streetNumber' => $addressUpdate->getStreetNumber(),
            'streetName' => $addressUpdate->getStreetName(),
            'postalCode' => $addressUpdate->getPostalCode(),
            'city' => $addressUpdate->getCity(),
            'country' => $addressUpdate->getCountry()
        ], 'errors' => $errorlist];
        $this->render('index.user_update', $updateInfos);
    }

    public function property_listAction()
    {
        $element['title'] = "Liste des biens";
        $this->addContentToView($element);
        $propertyUpdate = new Property();
        $imageErrors='';

        // CHange indexTop value on checkbox change
        if (isset($_POST['id'])) {
            $propertyUpdate->setId($this->post('id'));
            $propertyUpdate->selectPropertyById();
            $propertyUpdate->setIndexTop(is_null($this->post('indexTop')) ? 0 : 1)->updateProperty();
        }
        $properties = new Property();
        if (isset($_POST['delete'])) {
            $properties->deleteProperty($this->post('id'));
        }
        $lists = $properties->selectAll();
        $tab = ['lists' => $lists];
        $this->render('index.property_list', $tab);
    }

    public function property_createAction()
    {
        $element['title'] = "Créer un bien";
        $this->addContentToView($element);
        // Instanciation des classes
        $insertAddress = new Address();
        $insertProperty = new Property();
        $insertImage = new Image();
        $upload = new Upload();
        $upload->setPath(BASE_IMG_PROPERTIES)
            ->setMaxSize(25)
            ->setValidFile(['jpg' => 'image/jpeg', 'png' => 'image/png', 'jfif' => 'image/jfif']);
        $imageErrors = '';
        // Au clic sur le submit
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
                    ->setIndexTop(is_null($this->post('indexTop')) ? 0 : 1)
                    ->setDescription($this->post('description'))
                    ->setVisible(is_null($this->post('visible')) ? 0 : 1)
                    ->setIdCategory($this->post('category'))
                    ->setIdUser(1);
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
                    $properties = new Property();
                    $lists = $properties->selectAll();
                    $tab = ['lists' => $lists, 'errors' => $imageErrors];
                    $this->render('index.property_list', $tab);
                } else {
                    // Si erreurs dans la validation
                    $propertyErrors = $insertProperty->getErrorMessage();
                    $addressErrors = $insertAddress->getErrorMessage();
                    $errorlist = array_merge($propertyErrors, $addressErrors);
                    $errors = ['errors' => $errorlist];
                    $this->render('index.property_create', $errors);
                }
            } else {
                echo 'Expiration du formulaire.';
            }
        }
        $this->render('index.property_create');
    }

    public function property_updateAction($params)
    {
        $element['title'] = "Modifier un bien";
        $this->addContentToView($element);
        $imageErrors='';
        $propertyUpdate = new Property();
        $addressUpdate = new Address();
        $imagesUpdate = new Image();
        $upload = new Upload();
        $upload->setPath(BASE_IMG_PROPERTIES)
            ->setMaxSize(25)
            ->setValidFile(['jpg' => 'image/jpeg', 'png' => 'image/png', 'jfif' => 'image/jfif']);
        $propertyUpdate->setId($params);
        $propertyUpdate->selectPropertyById();
        $addressUpdate->setId($propertyUpdate->getIdAddress());
        $addressUpdate->selectAddressByPropertyId();
        $images = $imagesUpdate->selectImagesByPropertyId($params);

        if (isset($_POST['update-property'])) {
            if ($this->checkCSRF()) {
                $addressUpdate->setStreetNumber($this->post('streetNumber'))
                    ->setStreetName($this->post('streetName'))
                    ->setPostalCode($this->post('postalCode'))
                    ->setCity($this->post('city'))
                    ->setCountry($this->post('country'));
                $propertyUpdate->setName($this->post('name'))
                    ->setReference($this->post('reference'))
                    ->setType($this->post('type'))
                    ->setPrice($this->post('price'))
                    ->setSurfaceArea($this->post('surfaceArea'))
                    ->setRooms($this->post('rooms'))
                    ->setBedrooms($this->post('bedrooms'))
                    ->setEnergyClass($this->post('energyClass'))
                    ->setIndexTop(is_null($this->post('indexTop')) ? 0 : 1)
                    ->setDescription($this->post('description'))
                    ->setVisible(is_null($this->post('visible')) ? 0 : 1)
                    ->setIdCategory($this->post('category'));
                if ($addressUpdate->isValid() && $propertyUpdate->isValid()) {
                    $addressUpdate->updateAddress();
                    $propertyUpdate->updateProperty();

                    if (isset($_FILES['image1'])) {
                        $upload->setFileName($propertyUpdate->getReference() . "_1.png")
                            ->upload("image1");
                        if (isset($_POST['img1']) && !empty($_POST['img1'])) {

                            $imagesUpdate->updateImage($_POST['img1']);
                        } else {
                            if ($upload->getSuccess()) {
                                $imagesUpdate->createImage($upload->getFilename(), 1, $propertyUpdate->getId());
                            }
                        }
                    }

                    if (isset($_FILES['image2'])) {
                        $upload->setFileName($propertyUpdate->getReference() . "_2.png")
                            ->upload("image2");
                        if (isset($_POST['img2']) && !empty($_POST['img2'])) {
                            $imagesUpdate->updateImage($_POST['img2']);
                        } else {
                            if ($upload->getSuccess()) {
                                $imagesUpdate->createImage($upload->getFilename(), 0, $propertyUpdate->getId());
                            }
                        }
                    }
                    if (isset($_FILES['image3'])) {
                        $upload->setFileName($propertyUpdate->getReference() . "_3.png")
                            ->upload("image3");
                        if (isset($_POST['img3']) && !empty($_POST['img3'])) {
                            $imagesUpdate->updateImage($_POST['img3']);
                        } else {
                            if ($upload->getSuccess()) {
                                $imagesUpdate->createImage($upload->getFilename(), 0, $propertyUpdate->getId());
                            }
                        }
                    }
                    if (!$upload->isValid()) {
                        $imageErrors = $upload->getErrorMessage();
                    }
                    $properties = new Property();
                    $lists = $properties->selectAll();
                    $tab = ['lists' => $lists, 'errors' => $imageErrors];
                    $this->render('index.property_list', $tab);
                } else {
                    // Si erreurs dans la validation
                    $propertyErrors = $propertyUpdate->getErrorMessage();
                    $addressErrors = $addressUpdate->getErrorMessage();
                    $errorlist = array_merge($propertyErrors, $addressErrors);
                    $infos = [
                        'id' => $params,
                        'name' => $propertyUpdate->getName(),
                        'reference' => $propertyUpdate->getReference(),
                        'type' => $propertyUpdate->getType(),
                        'price' => $propertyUpdate->getPrice(),
                        'surfaceArea' => $propertyUpdate->getSurfaceArea(),
                        'rooms' => $propertyUpdate->getRooms(),
                        'bedrooms' => $propertyUpdate->getBedrooms(),
                        'energyClass' => $propertyUpdate->getEnergyClass(),
                        'indexTop' => $propertyUpdate->getIndexTop(),
                        'description' => $propertyUpdate->getDescription(),
                        'visible' => $propertyUpdate->getVisible(),
                        'category' => $propertyUpdate->getIdCategory(),
                        'streetNumber' => $addressUpdate->getStreetNumber(),
                        'streetName' => $addressUpdate->getStreetName(),
                        'postalCode' => $addressUpdate->getPostalCode(),
                        'city' => $addressUpdate->getCity(),
                        'country' => $addressUpdate->getCountry(),
                        'category' => $propertyUpdate->getIdCategory(),
                        'images' => $images
                    ];
                    $tab = ['errors' => $errorlist, 'infos' => $infos];
                    $this->render('index.property_update', $tab);
                }
            } else {
                echo 'Expiration du formulaire.';
            }
        }

        $infos = [
            'id' => $params,
            'name' => $propertyUpdate->getName(),
            'reference' => $propertyUpdate->getReference(),
            'type' => $propertyUpdate->getType(),
            'price' => $propertyUpdate->getPrice(),
            'surfaceArea' => $propertyUpdate->getSurfaceArea(),
            'rooms' => $propertyUpdate->getRooms(),
            'bedrooms' => $propertyUpdate->getBedrooms(),
            'energyClass' => $propertyUpdate->getEnergyClass(),
            'indexTop' => $propertyUpdate->getIndexTop(),
            'description' => $propertyUpdate->getDescription(),
            'visible' => $propertyUpdate->getVisible(),
            'category' => $propertyUpdate->getIdCategory(),
            'streetNumber' => $addressUpdate->getStreetNumber(),
            'streetName' => $addressUpdate->getStreetName(),
            'postalCode' => $addressUpdate->getPostalCode(),
            'city' => $addressUpdate->getCity(),
            'country' => $addressUpdate->getCountry(),
            'category' => $propertyUpdate->getIdCategory(),
            'images' => $images
        ];
        $tab = ['infos' => $infos];
        $this->render('index.property_update', $tab);
    }

    public function message_listAction()
    {
        $element['title'] = "Liste des messages";
        $this->addContentToView($element);
        $messages = new Message();
        if (isset($_POST['delete'])) {
            $messages->deleteMessage($this->post('id'));
        }
        $lists = $messages->selectAll();
        $tab = ['lists' => $lists];
        $this->render('index.message_list', $tab);
    }

    public function message_detailAction($params)
    {
        $element['title'] = "Detail du message";
        $messageDetail = new Message();
        $messageDetail->setId($params);
        $messageDetail->selectMessageById();
        $messageDetail->seenMessage($params);
        $messageUser = new User();
        $messageUser->setId($messageDetail->getIdUser());
        $messageUser->selectUserByMessageId();
        if (isset($_POST['delete'])) {
            $messageDetail->deleteMessage($this->post('id'));
            $lists = $messageDetail->selectAll();
            $tab = ['lists' => $lists];
            $this->render('index.message_list', $tab);
        }

        $messageInfos = [
            'id' => $params,
            'object' => $messageDetail->getObject(),
            'content' => $messageDetail->getContent(),
            'seen' => $messageDetail->getSeen(),
            'idUser' => $messageDetail->getidUser(),
            'username' => $messageUser->getName(),
            'surname' => $messageUser->getSurname(),
            'mail' => $messageUser->getMail()
        ];
        $this->render('index.message_detail', $messageInfos);


        $this->render('index.message_detail');
    }

    public function import_exportAction()
    {
        $element['title'] = "Import / Export";
        $this->addContentToView($element);
        $propertyTable = new Property();

        $propertyTable->setErrorMessage('export', 'message erreur export test');
        $error = $propertyTable->getErrorMessage('export');
        if (isset($_POST['export'])) {
            $result = $propertyTable->selectPropertiesByDate($this->post('start'), $this->post('end'));
            $lists = ['lists' => $result];

            // rap2hpoutre/fast-excel 
            $collect = [];
            for ($loop = 0; $loop < count($result); $loop++) {
                array_push($collect, ['reference' => $result[$loop]['reference'], 'name' => $result[$loop]['name'], 'vendeur' => $result[$loop]['surname'] . " " . $result[$loop]['username'], 'type' => $result[$loop]['type'], 'categorie' => $result[$loop]['idCategory'], 'prix' => $result[$loop]['price'], 'surface' => $result[$loop]['surfaceArea'], 'pièces' => $result[$loop]['rooms'], 'chambres' => $result[$loop]['bedrooms'], 'classe énergétique' => $result[$loop]['energyClass'], 'addresse' => $result[$loop]['streetNumber'] . " " . $result[$loop]['streetName'] . " " . $result[$loop]['postalCode'] . " " . $result[$loop]['city'] . " - " . $result[$loop]['country']]);
            }
            $list = collect($collect);
            (new FastExcel($list))->export('listebiens' . date("y-m-d_g-i") . '.xlsx');
            $this->render('index.import_export', $lists);
        }
        $this->render('index.import_export');
    }
}
