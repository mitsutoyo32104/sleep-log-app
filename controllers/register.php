<?php
namespace controllers\register;

use libs\auth;

function get() {
  require_once BASE_DIR . 'views/register.php';
}

function post() {
  $name = get_param('name');
  $password = get_param('password');
  $nickname = get_param('nickname');

  if(Auth::regist($name, $password, $nickname)) {
    echo 'ユーザー登録に成功しました';
  } else {
    echo 'ユーザー登録に失敗しました。';
  }
}