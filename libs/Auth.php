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
        Message::pushMessage(Message::ERROR_MESSAGE, 'ログインに成功しました。');  
      } 
      else {
        Message::pushMessage(Message::ERROR_MESSAGE, 'ログインに失敗しました。');  
      }

    } else {
      Message::pushMessage(Message::INFO_MESSAGE, 'ユーザーが存在しません。');
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
      $user->password = password_hash($user->password, PASSWORD_DEFAULT);

      if(UserRepository::insert($user->name, $user->password, $user->nickname)) {
        $is_success = true;
        UserModel::setSession($user);
      } else {
        echo 'ユーザー登録に失敗しました';
      };
    }
    
    return $is_success;
  }

  public static function edit(UserModel $user) {
    $is_success = false;
    $exist_user = UserRepository::fetchByName($user->name);

    if(!empty($exist_user)) {
      echo '同じ名前のユーザーが既に存在します。';
      return;
    } 
    else {
      $session_user = UserModel::getSession();
      $now_user = UserRepository::fetchByName($session_user->name);
      
      $user->id = $now_user->id;
      $user->password = password_hash($user->password, PASSWORD_DEFAULT);
    }

    $is_success = UserRepository::edit($user->id, $user->name, $user->password, $user->nickname);

    if($is_success) {
      Message::pushMessage(Message::ERROR_MESSAGE, 'ユーザー情報編集に成功しました。');
      UserModel::setSession($user);
    } else {
      Message::pushMessage(Message::ERROR_MESSAGE, 'ユーザー情報編集に失敗しました。');
    };

    return $is_success;
  }

  public static function isLogin() {
    $user = UserModel::getSession();

    return $user ? true : false; 
  }
}