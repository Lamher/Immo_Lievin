<?php

namespace App\Models;

use Core\Model;

class Message extends Model
{
    protected $object;
    protected $content;
    protected $seen;
    protected $idUser;
    protected $creationDate;
    protected $updateDate;
    protected $deleteDate;
    protected $active;
    protected $count;


    public function __construct()
    {
        $this->_table = 'messages';
    }

    public function selectAll()
    {
        return $this->select('messages.*,users.surname, users.name as username', 'messages.active=1', [], "INNER JOIN users ON users.id=messages.idUser")->fetchAll();
    }

    public function countUnseen()
    {
        $unseen = $this->select('COUNT(*) as nb', 'seen=0')->fetch();
        $this->setCount($unseen['nb']);
        return $this;
    }

    public function selectMessageById()
    {
        $result = $this->select('*', 'id = :id', ["id" => $this->id])->fetch();
        $this->hydrate($result);
    }

    public function deleteMessage($id)
    {
        return $this->delete(["id" => $id], 'id = :id');
    }
    public function seenMessage($id)
    {
        return $this->update(["id" => $id, "seen" => 1], 'id = :id');
    }

    public function insertMessage($idUser)
    {
        $data = ['object' => $this->getObject(), 'content' => $this->getContent(), "idUser" => $idUser];
        return $this->insert($data);
    }

    /**
     * Get the value of object
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set the value of object
     *
     * @return  self
     */
    public function setObject($object)
    {
        if (empty($object)) {
            $this->setErrorMessage('object', 'L\'objet du message doit être renseigné.');
        } else {
        $this->object = $object;
        }
        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        if (empty($content)) {
            $this->setErrorMessage('content', 'Le message n\'a pas de contenu.');
        } else {
        $this->content = $content;
        }
        return $this;
    }

    /**
     * Get the value of seen
     */
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * Set the value of seen
     *
     * @return  self
     */
    public function setSeen($seen)
    {
        $this->seen = $seen;

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
     * Get the value of count
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set the value of count
     *
     * @return  self
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }
}
