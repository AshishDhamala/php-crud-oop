<?php

class session
{
  public $user_id;
  private $logged_in = false;

  function __construct() {
    session_start();
    $this->check_login();
  }

  public static function hide_message() {
    unset( $_SESSION['message'] );
  }

  public static function delete_message() {
    $output = "<p class=\"deleteMessage\">" . $_SESSION['deleteMessage'] . "</p>";
    unset( $_SESSION['deleteMessage'] );
    return $output;
  }

  public static function edit_message() {
    $output = "<p class=\"editMessage\">" . $_SESSION['editMessage'] . "</p>";
    unset( $_SESSION['editMessage'] );
    return $output;
  }

  public static function temp_message($message = "") {
    $_SESSION['tempMessage'] = $message;
    $output = "<p class=\"tempMessage\">" . $_SESSION['tempMessage'] . "</p>";
    unset( $_SESSION['tempMessage'] );
    return $output;
  }

  public static function tempo_message($message = "") {
    $output = "";
    if( $message !== "" ) {
      $_SESSION['tempoMessage'] = $message;
    } else {
      if( isset( $_SESSION['tempoMessage'] ) ) {
        $output = "<p class=\"tempMessage\">" . $_SESSION['tempoMessage'] . "</p>";
        unset( $_SESSION['tempoMessage'] );
      }
    }
    return $output;
  }

  public function is_logged_in() {
    return $this->logged_in;
  }

  public function login($user) {
    if( $user ) {
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->logged_in = true;
    }
  }

  public function logout() {
    unset( $_SESSION['user_id'] );
    unset( $this->user_id );
    $this->logged_in = false;
  }

  private function check_login() {
    if( isset( $_SESSION['user_id'] ) ) {
      $this->user_id = $_SESSION['user_id'];
      $this->logged_in = true;
    } else {
      unset( $this->user_id );
      $this->logged_in = false;
    }
  }
}

$session = new session;
