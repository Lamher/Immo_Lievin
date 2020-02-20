<?php 

namespace Core;

use Core\Db;

class Model
{
    protected static $_table;

    protected $id;

    public function insert($fields) {
         
    }

    public function select()
    {

    }

    public static function find($params = []) {
       
        
      }

    public function update($fields) {
      
      }

    public function delete()
    {

    }

    public static function getDb(){
        if(!self::$_db) {
          self::$_db = Db::getInstance();
        }
        return self::$_db;
      }

}