<?php
require_once "../../includes/initialize.php";

$current_user = user::find_by_id($_SESSION['user_id']);

if ($current_user->admin === 1) {
  $content = new Contents();
  $content->id = $_GET['delete'];
  $content_to_be_deleted = Contents::find_by_id($_GET['delete']);

  if ($content->delete()) {
    $page_dir = "../pages/" . urlencode($content_to_be_deleted->title) . ".php";
    unlink($page_dir);
    $image_dir = "../images/" . $content_to_be_deleted->image_name;
    unlink($image_dir);
  }
} else {
  echo "You are not authorized to delete pages.";
}
