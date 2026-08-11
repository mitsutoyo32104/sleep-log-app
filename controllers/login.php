<?php
namespace controllers\login;

use repositories\UserRepository;

function get() {
  require_once BASE_DIR . 'views/login.php';
}

function post() {
  // key確認
  $name = get_param('name');
  $password = get_param('password');

  $result = login($name, $password);

  if($result) {
    echo '認証成功。';
    return;
  }

  echo '認証失敗。';
}

function login(string $name, string $password) {
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