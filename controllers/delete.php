<?php
namespace controllers\delete;

use libs\Auth;
use libs\Message;

function get() {
  $result = Auth::delete();

  if($result) {
    Message::pushMessage(Message::INFO_MESSAGE, '退会しました。');
  } else {
    Message::pushMessage(Message::ERROR_MESSAGE, '退会に失敗しました。');
    redirect('referer');
  }
}