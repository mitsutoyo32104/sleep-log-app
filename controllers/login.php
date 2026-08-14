<?php
namespace controllers\login;

use libs\Auth;
use models\UserModel;

function get() {
  $user = UserModel::getSession();

  if(isset($user)) {
    redirect('dashboard');
  }

  require_once BASE_DIR . 'views/login.php';
}

function post() {
  // key確認
  $user = new UserModel;
  $user->name = getParam('name');
  $user->password = getParam('password');

  $result = Auth::login($user);

  if($result) {
    redirect('dashboard');
  } else {
    redirect('referer');
  }
}