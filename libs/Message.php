<?php
// flash Pattern
namespace libs;

use models\SessionModel;

class Message extends SessionModel {
  protected static ?string $session_name = '_message'; 

  public const INFO_MESSAGE = 'info-message';
  public const ERROR_MESSAGE = 'error-message';
  public const DEBUG_MESSAGE = 'debug-message';

  public static function pushMessage(string $type, string $one_message) {
    if(!is_array(static::getSession())) {
      static::initMessage();
    }

    $messages = static::getSession();
    $messages[$type][] = $one_message;

    static::setSession($messages);
  }

  public static function flashMessage() {
    $typed_messages = static::getAndClearSession() ?? [];

    foreach($typed_messages as $type => $messages) {
      foreach($messages as $one_message) {
          echo "<div class='{$type}'>$one_message</div>";
      }
    }
  }

  public static function initMessage() {
    static::setSession([
      static::ERROR_MESSAGE => [],
      static::INFO_MESSAGE => [],
      static::DEBUG_MESSAGE => []
    ]);
  }
}