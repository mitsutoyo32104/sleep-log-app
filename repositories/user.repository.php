<?php
namespace repositories;

use models\UserModel;
use repositories\database\Database;

class UserRepository {

  public static function fetchByName($name) {
    
    $db = new Database;
    $sql = 'SELECT * FROM mst_users WHERE name = :name';
    $result = $db->selectOne($sql, [
      ':name' => $name
    ], Database::CLS, UserModel::class);
    
    return $result;
  }
}