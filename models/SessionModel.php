<?php
namespace models;

use Error;

abstract class SessionModel {
  protected static ?string $session_name = null;

  public static function setSession(mixed $val) {
    if(empty(static::$session_name)) {
      throw new Error('$session_nameをmodelに設定してください。');
    }
    $_SESSION[static::$session_name] = $val;
  }

  public static function getSession() {
    return $_SESSION[static::$session_name] ?? null;
  }

  public static function clearSession() {
    static::setSession(null);
  }

  // flash pattern
  public static function getAndClearSession() {
    try {
      return static::getSession();
    } 
    finally {
      static:: clearSession();
    }
  }
}