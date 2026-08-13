<?php
namespace controllers\login;

use libs\Auth;

function get() {
  require_once BASE_DIR . 'views/login.php';
}

function post() {
  // key確認
  $name = get_param('name');
  $password = get_param('password');

  $result = Auth::login($name, $password);

  if($result) {
    echo '認証成功。';
    return;
  }

  echo '認証失敗。';
}