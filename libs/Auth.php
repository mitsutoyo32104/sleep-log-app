<?php
namespace libs;

use repositories\UserRepository;

class Auth {

  public static function login(string $name, string $password) {
    $is_success = false;

    $user = UserRepository::fetchByName($name);

    if(!empty($user) && $user->del_flg !== 1) {

      if(password_verify($password, $user->password)) {

        $is_success = true;
        $_SESSION['user'] = $user;

      } else {
        echo 'パスワードが一致しません。もう一度ご確認ください。';
      }
    } else {
      echo 'ユーザーが見つかりません。もう一度ご確認ください。';
    }

    return $is_success;
  }

  public static function regist(string $name, string $password, string $nickname) {
    $is_success = false;
    $exist_user = UserRepository::fetchByName($name);

    if(!empty($exist_user)) {

      echo '同じ名前のユーザーが既に存在します。';
      return;

    } else {

      if(UserRepository::insert($name, $password, $nickname)) {
        $is_success = true;
      } else {
        echo 'ユーザー登録に失敗しました';
      };

    }
    
    return $is_success;
  }
}