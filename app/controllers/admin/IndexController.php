<?php


namespace App\Controllers\Admin;

use App\Controllers\Admin\AppController;
use App\Models\User;
use App\Models\Address;
use App\Models\Property;
use App\Models\Image;
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
        $lists = $users->selectAll();
        $tab = ['lists' => $lists];

        $this->render('index.user_list', $tab);
    }

    public function user_createAction()
    {
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
                ->setCountry($this->post('city'))
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
        $lists = $properties->selectAll();
        $tab = ['lists' => $lists];
        $this->render('index.property_list', $tab);
    }

    public function property_createAction()
    {
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.property_create', $tabPosts1);
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
            }
            if (isset($_FILES['image2'])) {
                $upload->setFileName($propertyUpdate->getReference() . "_2.png")
                    ->upload("image2");
            }
            if (isset($_FILES['image3'])) {
                $upload->setFileName($propertyUpdate->getReference() . "_3.png")
                    ->upload("image3");
            }
            

            $addressUpdate->setStreetNumber($this->post('streetNumber'))
                ->setStreetName($this->post('streetName'))
                ->setPostalCode($this->post('postalCode'))
                ->setCity($this->post('city'))
                ->setCountry($this->post('city'))
                ->setCountry($this->post('country'))
                ->updateAddress();

            // $properties = new Property();
            // $lists = $properties->selectAll();
            // $tab = ['lists' => $lists];
            // $this->render('index.property_list', $tab);
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
        $this->render('index.message_list');
    }

    public function message_detailAction()
    {
        $this->render('index.message_detail');
    }

    public function import_exportAction()
    {
        $this->render('index.import_export');
    }
}
