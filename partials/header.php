<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SLeep Log</title>
  <link rel="stylesheet" href="<?php echo CONTEXT_PATH . 'css/style.css' ?>">
  <script src="<?php echo CONTEXT_PATH . 'js/main.js' ?>"></script>
</head>
<body>
<header>
  <img class="icon" src="<?php echo CONTEXT_PATH . 'imgs/icon.svg' ?>" alt="">
  <h1>SLEEP & CBY LOG</h1>
</header>

<?php 
use libs\Message;
use models\UserModel;

Message::flashMessage();
$session_user = UserModel::getSession();

if(isset($session_user)) {
  echo "ようこそ{$session_user->nickname}さん";
}
?>