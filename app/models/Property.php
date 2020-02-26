<?php

namespace App\Models;

use Core\Model;

class Property extends Model
{
    protected $name;
    protected $reference;
    protected $type;
    protected $price;
    protected $surfaceArea;
    protected $rooms;
    protected $bedrooms;
    protected $energyClass;
    protected $indexTop;
    protected $description;
    protected $visible;
    protected $idAddress;
    protected $idCategory;
    protected $creationDate;
    protected $updateDate;
    protected $deleteDate;
    protected $active;


    public function __construct()
    {
        $this->_table = 'properties';
    }

    public function selectPropertyById()
    {
        $result = $this->select('*', 'id = :id', ["id" => $this->id])->fetch();
        $this->hydrate($result);
    }

    public function selectPropertiesByDate($dateStart, $dateEnd)
    {
        return $this->select('properties.*,users.surname, users.name as username', "properties.dateCreate >= $dateStart AND properties.dateCreate <= $dateEnd", [], "INNER JOIN users ON users.id=properties.idUser INNER JOIN addresses ON addresses.id = properties.idAddress")->fetchAll();
    }

    public function selectAll()
    {
        return $this->select('properties.*,users.surname, users.name as username', 'properties.active=1', [], "INNER JOIN users ON users.id=properties.idUser")->fetchAll();
    }

    public function updateProperty()
    {
        $data = ['name' => $this->getName(), 'reference' => $this->getReference(), 'type' => $this->getType(), 'price' => $this->getPrice(), 'surfaceArea' => $this->getSurfaceArea(), 'rooms' => $this->getRooms(), 'bedrooms' => $this->getBedrooms(), 'energyClass' => $this->getEnergyClass(), 'description' => $this->getDescription(), 'indexTop' => $this->getIndexTop(), 'idCategory' => $this->getIdCategory(), 'visible' => $this->getVisible(), 'updateDate' => date('Y-m-d H:i:s'), 'id' => $this->getId()];
        return $this->update($data, 'id = :id');
    }

    public function deleteProperty($id) {
        return $this->delete(["id"=>$id],'id = :id');
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of surfaceArea
     */
    public function getSurfaceArea()
    {
        return $this->surfaceArea;
    }

    /**
     * Set the value of surfaceArea
     *
     * @return  self
     */
    public function setSurfaceArea($surfaceArea)
    {
        $this->surfaceArea = $surfaceArea;

        return $this;
    }

    /**
     * Get the value of rooms
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set the value of rooms
     *
     * @return  self
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * Get the value of bedrooms
     */
    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    /**
     * Set the value of bedrooms
     *
     * @return  self
     */
    public function setBedrooms($bedrooms)
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    /**
     * Get the value of energyClass
     */
    public function getEnergyClass()
    {
        return $this->energyClass;
    }

    /**
     * Set the value of energyClass
     *
     * @return  self
     */
    public function setEnergyClass($energyClass)
    {
        $this->energyClass = $energyClass;

        return $this;
    }

    /**
     * Get the value of indexTop
     */
    public function getIndexTop()
    {
        return $this->indexTop;
    }

    /**
     * Set the value of indexTop
     *
     * @return  self
     */
    public function setIndexTop($indexTop)
    {
        $this->indexTop = $indexTop;

        return $this;
    }

    /**
     * Get the value of visible
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set the value of visible
     *
     * @return  self
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get the value of idAdress
     */
    public function getIdAddress()
    {
        return $this->idAdress;
    }

    /**
     * Set the value of idAdress
     *
     * @return  self
     */
    public function setIdAddress($idAdress)
    {
        $this->idAdress = $idAdress;

        return $this;
    }

    /**
     * Get the value of idCategory
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set the value of idCategory
     *
     * @return  self
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;

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

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
