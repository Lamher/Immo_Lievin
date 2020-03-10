<?php

namespace Core;

use Core\Db;

class Model
{
  protected $_table;
  protected static $_db;
  protected $id;
  protected $_PDOStatment;
  public $_LastInsertId;
  public $_RowCount;
  public $errors = [];

  public static function getDb()
  {
    if (!self::$_db) {
      self::$_db = Db::getInstance();
    }
    return self::$_db;
  }
  public static function getPdo()
  {
    return self::getDb()->_pdo;
  }

  public function isValid(){
    if(empty($this->errors)){
      return true;
    }else{
      return false;
    }
  }

  public function query(string $request, array $markers = []): self
  {
    $this->_PDOStatment = $this->getPdo()->prepare($request);
    // var_dump($request);
    // var_dump($markers);
    try {
      $this->getPdo()->beginTransaction();
      $this->_PDOStatment->execute($markers);
      $this->_LastInsertId = $this->getPdo()->lastInsertId();
      $this->_RowCount = $this->_PDOStatment->rowCount();
      $this->getPdo()->commit();
    } catch (\PDOException $error) {
      $this->getPdo()->rollBack();
    }
    return $this;
  }

  // Select all elements in the table and hydrate them via setters
  public function select($target, $where = NULL, $markers = [], $nestedRequest = NULL)
  {
    if (isset($where)) {
      return $this->query("SELECT $target FROM $this->_table $nestedRequest WHERE $where;", $markers);
    } else {
      return $this->query("SELECT $target FROM $this->_table $nestedRequest;", $markers);
    }
  }

  // recreate the setter method name for each element of the table, and define its value depending of said element in the table
  public function hydrate($donnees)
  {
    foreach ($donnees as $attribut => $valeur) {
      $methode = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
      if (is_callable(array($this, $methode))) {
        $this->$methode($valeur);
      }
    }
  }

  public function insert(array $values): self
  {
    $markers = [];
    $insert = "INSERT INTO $this->_table (`" . implode('`,`', array_keys($values)) . "`) VALUES (:" . implode(',:', array_keys($values)) . ");";
    foreach ($values as $key => $val) {
      $markers[":$key"] = $val;
    }
    return $this->query($insert, $markers);
  }


  public function update(array $data, string $where): self
  {
    $update = "UPDATE $this->_table SET ";
    foreach ($data as $key => $val) {
      if ($key != "id") {
        $update .= "$key = :$key,";
      }
      $markers[":$key"] = $val;
    }
    $update = substr($update, 0, -1);
    $update .= " WHERE $where;";
    return $this->query($update, $markers);
  }

  public function delete(array $data, string $where)
  {
    $delete = "UPDATE $this->_table SET active=0 WHERE $where;";
    var_dump($delete);
    var_dump($data);
    return $this->query($delete, $data);
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }


  /**
   * Method to fetch all the values from a PDOStatment
   */
  public function fetchAll()
  {
    return $this->_PDOStatment->fetchAll();
  }

  /**
   * Method to fetch first value from a PDOStatment
   */
  public function fetch()
  {
    return $this->_PDOStatment->fetch();
  }

  public function fetchAssoc()
  {
    return $this->_PDOStatment->fetchAll(\PDO::FETCH_ASSOC);
  }

  /**
   * Get the value of errors
   */
  public function getErrorMessage()
  {
    return $this->errors;
  }

  /**
   * Set the value of errors
   *
   * @return  self
   */
  public function setErrorMessage($key, $message)
  {
    $this->errors[$key] = "<p class='error'>$message</p>";

    return $this;
  }
}
