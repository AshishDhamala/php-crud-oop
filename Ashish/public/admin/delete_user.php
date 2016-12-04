<?php
require_once "../../includes/initialize.php";

$user = user::find_by_id($_GET["delete"]);
$current_user = user::find_by_id($_SESSION['user_id']);
if( $current_user->admin ) {
  $user->delete();  // Here jpt error is shown by phpstorm ide but the code is working perfectly fine
  $_SESSION['deleteMessage'] = "You have successfully deleted {$user->username}.";
  redirect_to("view_user.php?LeftNav=1");
} else {
  $_SESSION['deleteMessage'] = "You are not authorized to delete the users.";
  redirect_to("view_user.php?LeftNav=1");
}
