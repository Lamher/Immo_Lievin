<?php

namespace App\Models;

use Core\Model;

class Favorite extends Model
{
    protected $idProperty;
    protected $idUser;
    protected $creation_date;


    public function __construct()
    {
        $this->_table = 'favorites';
    }

    public function setAsFavorite($idProperty, $idUser){
        $data = ['idProperty' => $idProperty, 'idUser' => $idUser];
        return $this->insert($data);
    }

    /**
     * Get the value of idProperty
     */ 
    public function getIdProperty()
    {
        return $this->idProperty;
    }

    /**
     * Set the value of idProperty
     *
     * @return  self
     */ 
    public function setIdProperty($idProperty)
    {
        $this->idProperty = $idProperty;

        return $this;
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of creation_date
     */ 
    public function getCreation_date()
    {
        return $this->creation_date;
    }

    /**
     * Set the value of creation_date
     *
     * @return  self
     */ 
    public function setCreation_date($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }
}