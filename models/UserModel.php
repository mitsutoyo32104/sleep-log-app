<?php
namespace models;

class UserModel {
  public string $id;
  public string $name;
  public string $password;
  public string $nickname;
  public string $created_at;
  public string $created_by;
  public string $updated_at;
  public string $updated_by;
  public int $del_flg;
}
