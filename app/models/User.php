<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $name;
    protected $surname;
    protected $mail;
    protected $password;
    protected $role;
    protected $idAddress;
    protected $creationDate;
    protected $updateDate;
    protected $deleteDate;
    protected $active;


    public function __construct()
    {
        $this->_table = 'users';
    }


    public function selectUserById()
    {
        $result = $this->select('*', 'id = :id', ["id" => $this->id])->fetch();
        $this->hydrate($result);
    }

    public function selectUserByMail()
    {
        $result = $this->select('*', 'mail = :mail', ["mail" => $this->mail])->fetch();
        $this->hydrate($result);
    }


    public function selectUserByMessageId()
    {
        $result = $this->select('*', 'id = :id', ["id" => $this->id])->fetch();
        $this->hydrate($result);
    }

    public function selectAll()
    {
        return $this->select('*', 'active=1')->fetchAll();
    }

    public function updateUser()
    {
        $data = ['name' => $this->getName(), 'surname' => $this->getSurname(), 'mail' => $this->getMail(), 'password' => $this->getPassword(), 'updateDate' => date('Y-m-d H:i:s'), 'id' => $this->getId()];
        return $this->update($data, 'id = :id');
    }

    public function insertUser($idAddress)
    {
        $data = ['name' => $this->getName(), 'surname' => $this->getSurname(), 'mail' => $this->getMail(), 'password' => $this->getPassword(), "idAddress" => $idAddress];
        return $this->insert($data);
    }

    public function deleteUser($id)
    {
        return $this->delete(["id" => $id], 'id = :id');
    }


    // public function delete(string $where)
    // {
    //   $delete = "UPDATE $this->_table SET active=0 WHERE $where;";
    //   $markers = [];
    //   return $this->query($delete, $markers);
    // }

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
        if (empty($name) || !preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $name)) {
            $this->setErrorMessage('name', 'Le format du nom de l\'utilisateur est invalide, ou le champ n\'a pas été rempli.');
        } else {
            $this->name = $name;
        }
        return $this;
    }

    /**
     * Get the value of surname
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */
    public function setSurname($surname)
    {
        if (empty($surname) || !preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $surname)) {
            $this->setErrorMessage('surname', 'Le format du prénom de l\'utilisateur est invalide, ou le champ n\'a pas été rempli.');
        } else {
            $this->surname = $surname;
        }
        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        if (empty($mail) || !preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $mail)) {
            $this->setErrorMessage('mail', 'Le format de l\'addresse mail est invalide, ou le champ n\'a pas été rempli.');
            $this->select('*', 'mail = :mail', ["mail" => $mail])->fetchAll();
            if ($this->_RowCount != 0) {
                $this->setErrorMessage('mail', 'Cette adresse mail est déjà utilisée.');
            }
        } else {
            $this->mail = $mail;
        }
        return $this;
    }

    public function setMailConnexion($mail)
    {
        $this->select('*', 'mail = :mail', ["mail" => $mail])->fetch();
        if ($this->_RowCount != 1) {
            $this->setErrorMessage('connexion', 'Adresse mail ou mot de passe invalide.');
        } else {
            $this->mail = $mail;
        }
        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setHashedPassword($password)
    {

        if (empty($password) || !preg_match("/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}$/", $password)) {
            $this->setErrorMessage('password', 'Au moins une lettre et un chiffre, plus de 6 caractères.');
        } else {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }

        return $this;
    }


    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setRole($role)
    {
        $this->role = $role;

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
