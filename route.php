<?php
// URIの末尾で呼び出す controller の http_method に応じた関数処理を実行

$request_end_path = str_replace(CONTEXT_PATH, '', $_SERVER['REQUEST_URI']);

$http_method = strtolower($_SERVER['REQUEST_METHOD']);

// controllerの実行、ファイルが存在しないなら404に飛ばす
function route(string $request_end_path, string $http_method) {
  if($request_end_path === '') {
  $request_end_path = 'dashboard';
  }

  $controller_file = BASE_DIR . "controllers/{$request_end_path}.php";

  if(!file_exists($controller_file)) {
    require_once BASE_DIR . "views/404.php";
    return;
  }
  
  require_once $controller_file;

  $http_method = "\controllers\\{$request_end_path}\\{$http_method}";
  $http_method();
}

route($request_end_path, $http_method);

