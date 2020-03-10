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
    protected $idUser;
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

    public function selectPropertyByIndexTop()
    {
        return $this->select('properties.*, images.name as imageName', 'properties.indexTop = 1 AND properties.visible=1 AND images.default=1', [], 'INNER JOIN images ON properties.id=images.idProperty')->fetchAll();
    }

    public function selectPropertyByFilter($type, $city, $category, $reference, $minPrice, $maxPrice)
    {
        $filter = '';
        $markers = [];
        if (!empty($type)) {
            $filter .= ' properties.type = :type AND';
            $tableType = ['type' => $type];
            $markers = array_merge($markers, $tableType);
        }
        if (!empty($city)) {
            $filter .= ' addresses.city = :city AND';
            $tableCity = ['city' => $city];
            $markers = array_merge($markers, $tableCity);
        }
        if (!empty($category)) {
            $filter .= ' properties.idCategory = :idCategory AND';
            $tableCategory = ['idCategory' => $category];
            $markers = array_merge($markers, $tableCategory);
        }
        if (!empty($reference)) {
            $filter .= ' properties.reference = :reference AND';
            $tableReference = ['reference' => $reference];
            $markers = array_merge($markers, $tableReference);
        }
        if (!empty($minPrice)) {
            $filter .= ' properties.price > :minPrice AND';
            $tableMinPrice = ['minPrice' => $minPrice];
            $markers = array_merge($markers, $tableMinPrice);
        }
        if (!empty($maxPrice)) {
            $filter .= ' properties.price < :maxPrice AND';
            $tableMaxPrice = ['maxPrice' => $maxPrice];
            $markers = array_merge($markers, $tableMaxPrice);
        }
        $filter = substr($filter, 0, -3);
        return $this->select('properties.*, images.name as imageName, addresses.*', $filter, $markers, 'INNER JOIN images ON properties.id=images.idProperty AND images.default=1 INNER JOIN addresses ON addresses.id=properties.idAddress')->fetchAll();
    }

    public function selectPropertyByType()
    {
        return $this->select('properties.*, images.name as imageName', 'properties.type = :type AND images.default=1', ['type' => $this->type], 'INNER JOIN images ON properties.id=images.idProperty')->fetchAll();
    }

    public function selectPropertiesByDate($dateStart, $dateEnd)
    {
        return $this->select('properties.*,addresses.*, users.surname, users.name as username', "properties.creationDate >= :dateStart AND properties.creationDate <= :dateEnd ORDER BY properties.reference", ["dateStart" => $dateStart . "T00:00:00.000Z", "dateEnd" => $dateEnd . "T00:00:00.000Z"], "INNER JOIN users ON users.id=properties.idUser INNER JOIN addresses ON addresses.id = properties.idAddress")->fetchAll();
    }

    public function selectPropertiesByDateAssoc($dateStart, $dateEnd)
    {
        return $this->select('properties.*,addresses.*, users.surname, users.name as username', "properties.creationDate >= :dateStart AND properties.creationDate <= :dateEnd ORDER BY properties.reference", ["dateStart" => $dateStart . "T00:00:00.000Z", "dateEnd" => $dateEnd . "T00:00:00.000Z"], "INNER JOIN users ON users.id=properties.idUser INNER JOIN addresses ON addresses.id = properties.idAddress")->fetchAssoc();
    }
    public function exportProperties()
    {
        return $this->query("SELECT users.name INTO OUTFILE '" . BASE_DIR . "customers.txt' FROM users;");
    }


    public function selectAll()
    {
        return $this->select('properties.*,users.surname, users.name as username', 'properties.active=1', [], "INNER JOIN users ON users.id=properties.idUser")->fetchAll();
    }

    public function selectAssoc()
    {
        return $this->select('properties.*,users.surname, users.name as username', 'properties.active=1', [], "INNER JOIN users ON users.id=properties.idUser")->fetchAssoc();
    }

    public function updateProperty()
    {
        $data = ['name' => $this->getName(), 'reference' => $this->getReference(), 'type' => $this->getType(), 'price' => $this->getPrice(), 'surfaceArea' => $this->getSurfaceArea(), 'rooms' => $this->getRooms(), 'bedrooms' => $this->getBedrooms(), 'energyClass' => $this->getEnergyClass(), 'description' => $this->getDescription(), 'indexTop' => $this->getIndexTop(), 'idCategory' => $this->getIdCategory(), 'visible' => $this->getVisible(), 'updateDate' => date('Y-m-d H:i:s'), 'id' => $this->getId()];
        return $this->update($data, 'id = :id');
    }

    public function insertProperty($idAddress)
    {
        $data = ['name' => $this->getName(), 'reference' => $this->getReference(), 'type' => $this->getType(), 'price' => $this->getPrice(), 'surfaceArea' => $this->getSurfaceArea(), 'rooms' => $this->getRooms(), 'bedrooms' => $this->getBedrooms(), 'energyClass' => $this->getEnergyClass(), 'description' => $this->getDescription(), 'indexTop' => $this->getIndexTop(), 'idCategory' => $this->getIdCategory(), 'idAddress' => $idAddress, 'idUser' => $this->getIdUser(), 'visible' => $this->getVisible()];
        return $this->insert($data);
    }

    public function deleteProperty($id)
    {
        return $this->delete(["id" => $id], 'id = :id');
    }
    public function selectPropertiesByType()
    {
        return $this->select('*', 'type=:type', ['type' => $this->type])->fetchAll();
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
        if (filter_var($name, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/")))) {
            $this->name = $name;
        } else {
            $this->setErrorMessage('name', 'Format de nom invalide.');
        }
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
        if (empty($reference) || !preg_match("/^[A-Z]\d{7}$/", $reference)) {
            $this->setErrorMessage('reference', 'La référence doit être au format M0000001, soit une lettre qui définit la catégorie du bien, puis 7 chiffres.');
        } else {
            $this->reference = $reference;
        }
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
        if (empty($price) || !filter_var($price, FILTER_VALIDATE_FLOAT)) {
            $this->setErrorMessage('price', 'Le format de prix est invalide.');
        } else {
            $this->price = $price;
        }
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
        if (empty($surfaceArea) || !filter_var($surfaceArea, FILTER_VALIDATE_FLOAT)) {
            $this->setErrorMessage('surfaceArea', 'Le format de surface est invalide.');
        } else {
            $this->surfaceArea = $surfaceArea;
        }
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
        if (!empty($rooms)) {
            if (!preg_match("/[0-9]+/", $rooms)) {
                $this->setErrorMessage('rooms', 'Le nombre de pièces doit être un nombre entier.');
                echo 'coucouy';
            } else {
                $this->rooms = $rooms;
            }
        }

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
        if (!empty($bedrooms)) {
            if (!preg_match("/[0-9]+/", $bedrooms)) {
                $this->setErrorMessage('bedrooms', 'Le nombre de chambres doit être un nombre entier.');
            } else {
                $this->bedrooms = $bedrooms;
            }
        }
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
        if (empty($energyClass) || !preg_match("/^[ABCDEF]$|\/\//", $energyClass)) {
            $this->setErrorMessage('energyClass', 'La classe énergie doit être renseignée ( A, B, C, D, E ou F ).');
        } else {
            $this->energyClass = $energyClass;
        }
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
        if (empty($description)) {
            $this->setErrorMessage('description', 'La description doit être renseignée.');
        } else {
            $this->description = $description;
        }
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
     * Get the value of idAddress
     */
    public function getIdAddress()
    {
        return $this->idAddress;
    }

    /**
     * Set the value of idAddress
     *
     * @return  self
     */
    public function setIdAddress($idAddress)
    {
        $this->idAddress = $idAddress;

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
}
