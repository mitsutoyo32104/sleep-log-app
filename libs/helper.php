<?php
function get_param(string $key, string $default_val = '', bool $is_post = true) {
  $method = $is_post ? $_POST : $_GET;
  return $method[$key] ?? $default_val;
}