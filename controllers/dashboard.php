<?php
namespace controllers\dashboard;

use models\UserModel;

function get() {
  $user = UserModel::getSession();
  
  if(!isset($user)) {
      redirect('login');
  }

  require_once BASE_DIR . 'views/dashboard.php';
}
