<?php
namespace repositories;

use models\UserModel;

class UserRepository {
 
  static function fetchByName(string $name) {
    $db = new Database;
    $sql = 'SELECT * FROM mst_users WHERE name = :name';

    $result = $db->selectOne($sql, [
      ':name' => $name
    ], Database::FETCH_MODE, UserModel::class);
    
    return $result;
  }

  static function insert(string $name, string $password, string $nickname) {
      $db = new Database;
      $sql = "INSERT INTO mst_users(name, password, nickname) VALUE (:name, :password, :nickname)";

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
      return $db->execute($sql, [
        ':name' => $name,
        ':password' => $hashed_password,
        ':nickname' => $nickname
      ]);
  }

  static function edit(int $id, string $name, string $password, string $nickname) {
    $db = new Database;
    $sql = "UPDATE mst_users SET name = :name, password = :password, nickname = :nickname WHERE id = :id";

    return $db->execute($sql, [
      ':id' => $id,
      ':name' => $name,
      ':password' => $password,
      ':nickname' => $nickname
    ]);
  }

  static function drop(string $name) {
    $db = new Database;
    $sql = "UPDATE mst_users SET del_flg = 1 WHERE name = :name";

    return $db->execute($sql, [
      ':name' => $name
    ]);
  }
}