<?php
namespace controllers\register;

use libs\auth;
use models\UserModel;

function get() {
  require_once BASE_DIR . 'views/register.php';
}

function post() {
  $user = new UserModel;

  $user->name = getParam('name');
  $user->password = getParam('password');
  $user->nickname = getParam('nickname');

  if(Auth::regist($user)) {
    echo 'ユーザー登録に成功しました';
    redirect('dashboard');
  } else {
    echo 'ユーザー登録に失敗しました。';
    redirect('referer');
  }
}