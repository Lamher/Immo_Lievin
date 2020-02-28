<?php

namespace App\Models;

use Core\Model;

class Address extends Model
{
    protected $streetNumber;
    protected $streetName;
    protected $postalCode;
    protected $city;
    protected $country;
    protected $creationDate;
    protected $updateDate;
    protected $deleteDate;
    protected $active;


    public function __construct()
    {
        $this->_table = 'addresses';
    }

    public function selectAddressByUserId()
    {
        $result = $this->select('*', 'id = :id', ["id" => $this->id])->fetch();
        $this->hydrate($result);
    }

    public function selectAddressByPropertyId()
    {
        $result = $this->select('*', 'id = :id', ["id" => $this->id])->fetch();
        $this->hydrate($result);
    }

    public function updateAddress(){
        $data = ['streetNumber'=>$this->getStreetNumber(),'streetName'=>$this->getStreetName(),'postalCode'=>$this->getPostalCode(),'city'=>$this->getCity(), 'country'=> $this->getCountry(),'updateDate'=>date('Y-m-d H:i:s'), 'id'=>$this->getId()];
        return $this->update($data, 'id = :id');
    }

    public function insertAddress(){
        $data = ['streetNumber'=>$this->getStreetNumber(),'streetName'=>$this->getStreetName(),'postalCode'=>$this->getPostalCode(),'city'=>$this->getCity(), 'country'=> $this->getCountry()];
        return $this->insert($data);
    }



    /**
     * Get the value of streetNumber
     */ 
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set the value of streetNumber
     *
     * @return  self
     */ 
    public function setStreetNumber($streetNumber)
    {
        if (empty($streetNumber) || !filter_var($streetNumber, FILTER_VALIDATE_FLOAT)) {
            $this->setErrorMessage('streetNumber', 'Le format du numéro de rue est invalide, ou le champ n\'a pas été rempli.');
        }else{
            $this->streetNumber = $streetNumber;
        }

        return $this;
    }

    /**
     * Get the value of streetName
     */ 
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set the value of streetName
     *
     * @return  self
     */ 
    public function setStreetName($streetName)
    {
        if (empty($streetName) || !is_string($streetName)) {
            $this->setErrorMessage('streetName', 'Le format du nom de rue est invalide, ou le champ n\'a pas été rempli.');
        }else{
            $this->streetName = $streetName;
        }
        return $this;
    }

    /**
     * Get the value of postalCode
     */ 
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     *
     * @return  self
     */ 
    public function setPostalCode($postalCode)
    {
        if (empty($postalCode) || !preg_match("/^\d{5}(?:[-\s]\d{4})?$/", $postalCode)) {
            $this->setErrorMessage('postalCode', 'Le format du code postal est invalide, ou le champ n\'a pas été rempli.');
        }else{
        $this->postalCode = $postalCode;
        }
        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        if (empty($city) || !preg_match("/[a-zA-Z]+(?:[ '-][a-zA-Z]+)*/", $city)) {
            $this->setErrorMessage('city', 'Le nom de ville est invalide, ou le champ n\'a pas été rempli.');
        }else{
        $this->city = $city;
        }
        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        if (empty($country) || !preg_match("/[a-zA-Z]+(?:[ '-][a-zA-Z]+)*/", $country)) {
            $this->setErrorMessage('country', 'Le nom de pays est invalide, ou le champ n\'a pas été rempli.');
        }else{
        $this->country = $country;
        }
        return $this;
    }

    /**
     * Get the value of creationDate
     */ 
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set the value of creationDate
     *
     * @return  self
     */ 
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get the value of updateDate
     */ 
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set the value of updateDate
     *
     * @return  self
     */ 
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get the value of deleteDate
     */ 
    public function getDeleteDate()
    {
        return $this->deleteDate;
    }

    /**
     * Set the value of deleteDate
     *
     * @return  self
     */ 
    public function setDeleteDate($deleteDate)
    {
        $this->deleteDate = $deleteDate;

        return $this;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }
}
