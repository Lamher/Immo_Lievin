<?php


namespace App\Controllers\Admin;

use App\Controllers\Admin\AppController;
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
        $insertAddress = new Address();
        $insertUser = new User();
        // Au submit
        if (isset($_POST['add-user'])) {
            // Création du record address
            $dataAddress = [
                "streetNumber" => $this->post('streetNumber'),
                "streetName" => $this->post('streetName'),
                "postalCode" => $this->post('postalCode'),
                "city" => $this->post('city'),
                "country" => $this->post('country')
            ];
            $insertAddress->insert($dataAddress);

            // Cration du record user
            $dataUser = ["name" => $this->post('name'), "surname" => $this->post('surname'), "mail" => $this->post('mail'), "password" => password_hash($_POST['password'], PASSWORD_DEFAULT), "idAddress" => $insertAddress->_LastInsertId];
            $insertUser->insert($dataUser);

            // Retour à la liste
            $users = new User();
            $lists = $users->selectAll();
            $tab = ['lists' => $lists];
            $this->render('index.user_list', $tab);
        }
        $this->render('index.user_create');
    }

    public function user_updateAction($params)
    {
        // Update users and addresses tables on submit
        $userUpdate = new User();
        $userUpdate->setId($params);
        $userUpdate->selectUserById();
        $addressUpdate = new Address();
        $addressUpdate->setId($userUpdate->getIdAddress());
        $addressUpdate->selectAddressByUserId();
        if (isset($_POST['update-user'])) {
            $userUpdate->setName($this->post('name'))
                ->setSurname($this->post('surname'))
                ->setMail($this->post('mail'))
                ->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT))->updateUser();
            $addressUpdate->setStreetNumber($this->post('streetNumber'))
                ->setStreetName($this->post('streetName'))
                ->setPostalCode($this->post('postalCode'))
                ->setCity($this->post('city'))
                ->setCountry($this->post('country'))
                ->updateAddress();
            //Redirecting to user_list
            $users = new User();
            $lists = $users->selectAll();
            $tab = ['lists' => $lists];
            $this->render('index.user_list', $tab);
        }

        // Select the values of each inputs depending of the user id set as parameter in the URI

        $updateInfos = [
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
        ];
        $this->render('index.user_update', $updateInfos);
    }

    public function property_listAction()
    {
        $propertyUpdate = new Property();
        
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
        $insertAddress = new Address();
        $insertProperty = new Property();
        $insertImage = new Image();
        var_dump($_FILES);
        if (isset($_POST['add-property'])) {
            $dataAddress = [
                "streetNumber" => $this->post('streetNumber'),
                "streetName" => $this->post('streetName'),
                "postalCode" => $this->post('postalCode'),
                "city" => $this->post('city'),
                "country" => $this->post('country')
            ];
            $insertAddress->insert($dataAddress);

            // Création du record address
            $dataProperty = [
                "name" => $this->post('name'),
                "reference" => $this->post('reference'),
                "type" => $this->post('type'),
                "price" => $this->post('price'),
                "surfaceArea" => $this->post('surfaceArea'),
                "rooms" => $this->post('rooms'),
                "bedrooms" => $this->post('bedrooms'),
                "energyClass" => $this->post('energyClass'),
                "indexTop" => is_null($this->post('indexTop')) ? 0 : 1,
                "description" => $this->post('description'),
                "visible" => is_null($this->post('visible')) ? 0 : 1,
                "idAddress" => $insertAddress->_LastInsertId,
                "idCategory" => $this->post('category'),
                "idUser" => 1
            ];
            $insertProperty->insert($dataProperty);


            $upload = new Upload();
            $upload->setPath(BASE_IMG_PROPERTIES)
                ->setMaxSize(25)
                ->setValidFile(['jpg' => 'image/jpeg', 'png' => 'image/png', 'jfif' => 'image/jfif']);
            if (isset($_FILES['image1'])) {
                $upload->setFileName($this->post('reference') . "_1.png")
                    ->upload("image1");
                $insertImage->createImage($this->post('reference') . "_1.png", 1, $insertProperty->_LastInsertId);
            }
            if (isset($_FILES['image2'])) {
                $upload->setFileName($this->post('reference') . "_2.png")
                    ->upload("image2");
                $insertImage->createImage($this->post('reference') . "_2.png", 1, $insertProperty->_LastInsertId);
            }
            if (isset($_FILES['image3'])) {
                $upload->setFileName($this->post('reference') . "_3.png")
                    ->upload("image3");
                $insertImage->createImage($this->post('reference') . "_3.png", 1, $insertProperty->_LastInsertId);
            }






            // $properties = new Property();
            // $lists = $properties->selectAll();
            // $tab = ['lists' => $lists];
            // $this->render('index.property_list', $tab);
        }
        $this->render('index.property_create');
    }

    public function property_updateAction($params)
    {
        $propertyUpdate = new Property();
        $propertyUpdate->setId($params);
        $propertyUpdate->selectPropertyById();
        $addressUpdate = new Address();
        $addressUpdate->setId($propertyUpdate->getIdAddress());
        $addressUpdate->selectAddressByPropertyId();
        $imagesUpdate = new Image();
        $images = $imagesUpdate->selectImagesByPropertyId($params);
        // var_dump($images);

        if (isset($_POST['update-property'])) {
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
                ->setIdCategory($this->post('category'))
                ->updateProperty();

            $upload = new Upload();
            $upload->setPath(BASE_IMG_PROPERTIES)
                ->setMaxSize(25)
                ->setValidFile(['jpg' => 'image/jpeg', 'png' => 'image/png', 'jfif' => 'image/jfif']);
            if (isset($_FILES['image1'])) {
                $upload->setFileName($propertyUpdate->getReference() . "_1.png")
                    ->upload("image1");
                if (isset($_POST['img1']) && !empty($_POST['img1'])) {

                    $imagesUpdate->updateImage($_POST['img1']);
                } else {
                    $imagesUpdate->createImage($upload->getFilename(), 1, $propertyUpdate->getId());
                }
            }

            if (isset($_FILES['image2'])) {
                $upload->setFileName($propertyUpdate->getReference() . "_2.png")
                    ->upload("image2");
                if (isset($_POST['img2']) && !empty($_POST['img2'])) {
                    $imagesUpdate->updateImage($_POST['img2']);
                } else {
                    $imagesUpdate->createImage($upload->getFilename(), 0, $propertyUpdate->getId());
                }
            }
            if (isset($_FILES['image3'])) {
                $upload->setFileName($propertyUpdate->getReference() . "_3.png")
                    ->upload("image3");
                if (isset($_POST['img3']) && !empty($_POST['img3'])) {
                    $imagesUpdate->updateImage($_POST['img3']);
                } else {
                    $imagesUpdate->createImage($upload->getFilename(), 0, $propertyUpdate->getId());
                }
            }


            $addressUpdate->setStreetNumber($this->post('streetNumber'))
                ->setStreetName($this->post('streetName'))
                ->setPostalCode($this->post('postalCode'))
                ->setCity($this->post('city'))
                ->setCountry($this->post('country'))
                ->updateAddress();

            $properties = new Property();
            $lists = $properties->selectAll();
            $tab = ['lists' => $lists];
            $this->render('index.property_list', $tab);
        }

        $updateInfos = [
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
        $this->render('index.property_update', $updateInfos);
    }

    public function message_listAction()
    {
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
        $this->render('index.import_export');
    }
}
