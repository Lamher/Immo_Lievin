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


class ApiController extends AppController
{



    public function __construct()
    {
        parent::__construct();
    }

    public function propertyAction($id)
    {
        // if (($_SERVER['PHP_AUTH_USER'] ?? '') == 'test' && ($_SERVER['PHP_AUTH_PW'] ?? '') == '1234') {
            // header("Content-Type: application/json; charset=UTF-8");
            // header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

            $requestMethod = $_SERVER["REQUEST_METHOD"];

            if ($requestMethod == "GET") {
                $property = new Property();
                $address = new Address();
                $property->setId($id);
                $property->selectPropertyById();
                $address->setId($property->getIdAddress());
                $address->selectAddressByPropertyId();
                $infos = [
                    'id' => $id,
                    'name' => $property->getName(),
                    'reference' => $property->getReference(),
                    'type' => $property->getType(),
                    'price' => $property->getPrice(),
                    'surfaceArea' => $property->getSurfaceArea(),
                    'rooms' => $property->getRooms(),
                    'bedrooms' => $property->getBedrooms(),
                    'energyClass' => $property->getEnergyClass(),
                    'indexTop' => $property->getIndexTop(),
                    'description' => $property->getDescription(),
                    'visible' => $property->getVisible(),
                    'category' => $property->getIdCategory(),
                    'streetNumber' => $address->getStreetNumber(),
                    'streetName' => $address->getStreetName(),
                    'postalCode' => $address->getPostalCode(),
                    'city' => $address->getCity(),
                    'country' => $address->getCountry(),
                    'category' => $property->getIdCategory()
                ];
                echo json_encode($infos);
            } else if ($requestMethod == "POST") {
                $insertAddress = new Address();
                $insertProperty = new Property();
                $input = [];
                parse_str(file_get_contents('php://input', $input));
                var_dump($input);
                exit;
                $insertAddress->setStreetNumber()
                    ->setStreetName()
                    ->setPostalCode()
                    ->setCity()
                    ->setCountry();
                $insertProperty->setName()
                    ->setReference()
                    ->setType()
                    ->setPrice()
                    ->setSurfaceArea()
                    ->setRooms()
                    ->setBedrooms()
                    ->setEnergyClass()
                    ->setIndexTop()
                    ->setDescription()
                    ->setVisible()
                    ->setIdCategory()
                    ->setIdUser();
                // Si validation pour addresse + bien, insert
                if ($insertAddress->isValid() && $insertProperty->isValid()) {
                    $insertAddress->insertAddress();
                    $insertProperty->insertProperty($insertAddress->_LastInsertId);
                    echo 'is ok';
                } else {
                    echo 'echec';
                }
            }
        // } else {
        //     echo "You shall not pass.";
        // }
    }

    public function propertiesAction()
    {
        // if (($_SERVER['PHP_AUTH_USER'] ?? '') == 'test' && ($_SERVER['PHP_AUTH_PW'] ?? '') == '1234') {
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            if ($requestMethod == "GET") {
                $properties = new Property();
                $lists = $properties->selectAssoc();
                echo json_encode($lists);
            } 
            // else if ($requestMethod == "POST") {
            //     $insertAddress = new Address();
            //     $insertProperty = new Property();
            //     $insertAddress->setStreetNumber($this->post('streetNumber'))
            //     ->setStreetName($this->post('streetName'))
            //     ->setPostalCode($this->post('postalCode'))
            //     ->setCity($this->post('city'))
            //     ->setCountry($this->post('country'));
            // $insertProperty->setName($this->post('name'))
            //     ->setReference($this->post('reference'))
            //     ->setType($this->post('type'))
            //     ->setPrice($this->post('price'))
            //     ->setSurfaceArea($this->post('surfaceArea'))
            //     ->setRooms($this->post('rooms'))
            //     ->setBedrooms($this->post('bedrooms'))
            //     ->setEnergyClass($this->post('energyClass'))
            //     ->setIndexTop($this->post('indexTop'))
            //     ->setDescription($this->post('description'))
            //     ->setVisible($this->post('visible'))
            //     ->setIdCategory($this->post('idCategory'))
            //     ->setIdUser($this->post('idUser'));
            //     // Si validation pour addresse + bien, insert
            //     if ($insertAddress->isValid() && $insertProperty->isValid()) {
            //         $insertAddress->insertAddress();
            //         $insertProperty->insertProperty($insertAddress->_LastInsertId);
            //         echo 'is ok';
            //     } else {
            //         echo 'echec';
            //     }
            // }
        // } else {
        //     echo "You shall not pass.";
        // }
    }
}
