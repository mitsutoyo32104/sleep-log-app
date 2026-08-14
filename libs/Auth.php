<?php
namespace libs;

use models\UserModel;
use repositories\UserRepository;
use libs\Message;

class Auth {

  public static function login(UserModel $user) {
    $is_success = false;

    $exist_user = UserRepository::fetchByName($user->name);

    if(!empty($exist_user) && $exist_user->del_flg !== 1) {

      if(password_verify($user->password, $exist_user->password)) {

        $is_success = true;
        UserModel::setSession($user);

      } else {
         Message::pushMessage(Message::INFO_MESSAGE, 'ログインに成功しました。');
      }
    } else {
      echo 'ユーザーが見つかりません。もう一度ご確認ください。';
    }

    return $is_success;
  }

  public static function regist(UserModel $user) {
    $is_success = false;

    $exist_user = UserRepository::fetchByName($user->name);

    if(!empty($exist_user)) {
      echo '同じ名前のユーザーが既に存在します。';
      return;
    } else {

      if(UserRepository::insert($user->name, $user->password, $user->nickname)) {
        $is_success = true;
        UserModel::setSession($user);
      } else {
        echo 'ユーザー登録に失敗しました';
      };
    }
    
    return $is_success;
  }

  public static function isLogin() {
    $user = UserModel::getSession();

    return $user ? true : false; 
  }
}