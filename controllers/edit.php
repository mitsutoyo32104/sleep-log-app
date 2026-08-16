<?php
namespace controllers\edit;

use models\UserModel;
use libs\Auth;

function get() {
  $user = UserModel::getSession();

  if(!isset($user)) {
    redirect('login');
  }

  require_once BASE_DIR . 'views/edit.php';
}

function post() {

  $user = new UserModel;
  $user->name = getParam('name');
  $user->password = getParam('password');
  $user->nickname = getParam('nickname');

  $result = Auth::edit($user);

  if($result) {
    redirect('dashboard');
  } else {
    redirect('referer');
  }
}
