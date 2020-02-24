<?php


namespace App\Controllers\Admin;

use App\Controllers\Admin\AppController;
use App\Models\User;
use App\Models\Address;
use App\Models\Property;

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
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.user_create', $tabPosts1);
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
            $userUpdate->setName($_POST['name'])->setSurname($_POST['surname'])->setMail($_POST['mail'])->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT))->updateUser();
            $addressUpdate->setStreetNumber($_POST['streetNumber'])->setStreetName($_POST['streetName'])->setPostalCode($_POST['postalCode'])->setCity($_POST['city'])->setCountry($_POST['city'])->setCountry($_POST['country'])->updateAddress();
            //Redirecting to user_list
            $users = new User();
            $lists = $users->selectAll();
            $tab = ['lists' => $lists];
            $this->render('index.user_list', $tab);
        }

        // Select the values of each inputs depending of the user id set as parameter in the URI

        $updateInfos = ['id' => $params, 'name' => $userUpdate->getName(), 'surname' => $userUpdate->getSurname(), 'mail' => $userUpdate->getMail(), 'password' => $userUpdate->getPassword(), 'streetNumber' => $addressUpdate->getStreetNumber(), 'streetName' => $addressUpdate->getStreetName(), 'postalCode' => $addressUpdate->getPostalCode(), 'city' => $addressUpdate->getCity(), 'country' => $addressUpdate->getCountry()];
        $this->render('index.user_update', $updateInfos);
    }

    public function property_listAction()
    {
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

    public function property_updateAction()
    {
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.property_update', $tabPosts1);
    }

    public function message_listAction()
    {
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.message_list', $tabPosts1);
    }

    public function message_detailAction()
    {
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.message_detail', $tabPosts1);
    }

    public function import_exportAction()
    {
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.import_export', $tabPosts1);
    }
}
