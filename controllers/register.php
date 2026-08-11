<?php
namespace controllers\register;

function get() {
  require_once BASE_DIR . 'views/register.php';
}

function post() {
  echo 'post 送信がされました';
}