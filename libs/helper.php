<?php
function getParam(string $key, string $default_val = '', bool $is_post = true) {
  $method = $is_post ? $_POST : $_GET;
  return $method[$key] ?? $default_val;
}

function redirect(string $path) {
  if($path === 'referer') {
    $path = $_SERVER['HTTP_REFERER'];
  } else {
    $path = getUrl($path);
  }

  header("Location: {$path}");
  die();
}

function getUrl(string $path) {
  return CONTEXT_PATH . trim($path, '/');
}