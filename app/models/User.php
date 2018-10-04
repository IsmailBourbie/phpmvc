<?php

namespace App\Models;


use Core\Model;

class User extends Model {


   public static function getById($id)
   {
      $db = static::getDB();
      $sql = 'SELECT name, email FROM users WHERE id = :id';
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(\PDO::FETCH_ASSOC);
      return $result;
   }
}