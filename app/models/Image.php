<?php

namespace App\Models;

use Core\Model;

class Image extends Model
{
    protected $name;
    protected $default;
    protected $idProperty;
    protected $creationDate;
    protected $updateDate;
    protected $deleteDate;
    protected $active;


    public function __construct()
    {
        $this->_table = 'images';
    }

    public function selectImagesByPropertyId($idProperty)
    {
        return $this->select('images.*',  'properties.id = :id', ["id" => $idProperty], "INNER JOIN properties ON properties.id=images.idProperty")->fetchAll();
    }

    public function updateImage($id)
    {
        $data = ['updateDate' => date('Y-m-d H:i:s'), 'id' => $id];
        return $this->update($data, 'id= :id');
    }

    public function createImage($name, $default, $idProperty) {
        return $this->insert(['name'=>$name,'default'=>$default, 'idProperty'=>$idProperty]);
    }
//    public function selectImageByIdProperty($propertiesId)
//    {
//        return $this->select('images.*', 'idProperty= :id',["id" => $propertiesId], "INNER JOIN properties on images.idProperty = properties.id")->fetchAll();
//    }

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
        if (empty($name) || !preg_match("/^[A-Z]\d{7}.png$/", $name)) {
            $this->setErrorMessage('img-name', 'Le nom de l\'image doit être au format M0000001.png, soit une lettre qui définit la catégorie du bien, puis 7 chiffres suivis de .png.');
        } else {
        $this->name = $name;
        }
        return $this;
    }

    /**
     * Get the value of default
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set the value of default
     *
     * @return  self
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
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
