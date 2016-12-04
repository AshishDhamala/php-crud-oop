<?php

include_once "database.php";
include_once "DatabaseCommon.php";

$delete_id = null;

class user extends DatabaseCommon
{
  public static $database_fields = ["admin", "username", "email", "password"];
  protected static $table_name = "users";
  public $id;
  public $admin = 0;
  public $username;
  public $email;
  public $password;

  public static function authenticate($email = "", $password = "") {
    global $database;
    $email = $database->escape_value($email);
    $password = $database->escape_value($password);
    $found_user = self::find_by_attribute_with_limit("email", $email, 1);

    if( $found_user ) {
      $found_user_password = $found_user->password;

      // If inbuilt function password_verify() finds that passwords have matched, then we proceed further.
      if( password_verify($password, $found_user_password) ) {
        $sql = "SELECT * FROM users WHERE ";
        $sql .= "email='{$email}' AND password='{$found_user_password}' ";
        $sql .= "LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty( $result_array ) ? $result_array[0] : false;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public static function display_all_users() {
    $increment = 1;
    //$all_users = self::find_all("users");
    $all_users = self::find_all();
    $output = "<div class=\"table-responsive\">";
    $output .= "<table class=\"table table-inverse\">";
    $output .= "<thead>";
    $output .= "<tr><th>S.N.</th><th>Username</th><th>Email</th><th>Edit</th><th>Delete</th></tr>";
    $output .= "</thead>";

    $output .= "<tbody>";
    foreach( $all_users as $user ) {
      $user->username = $user->admin ? $user->username . " (main)" : $user->username;
      $output .= "<tr>";
      $output .= "<td>" . $increment++ . "</td>";
      $output .= "<td>" . htmlspecialchars($user->username) . "</td>";
      $output .= "<td>" . htmlspecialchars($user->email) . "</td>";
      $output .= "<td><a href=\"edit_user.php?edit=$user->id\">Edit</a></td>";
      $output .= "<td><a href=\"delete_user.php?delete=$user->id\">Delete</a></td>";
      $output .= "</tr>";
    }
    $output .= "</tbody></table></div>";
    return $output;
  }

}
