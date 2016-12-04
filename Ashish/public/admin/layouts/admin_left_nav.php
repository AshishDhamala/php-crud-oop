<!-- <?php //require_once("C:\\xampp\htdocs\MyProjectsWithPHP\From Lynda OOP\includes\project_paths.php"); ?> -->
<?php
$id = $_SESSION['user_id'];
$current_user = user::find_by_id($id);

if( isset( $_GET['LeftNav'] ) ) {
  $LeftNav = $_GET['LeftNav'];
} else {
  $LeftNav = "";
}
?>
<div class="left col-sm-12 noPadding">
  <h3>User Management</h3>
  <ul>
    <li><a href="view_user.php?LeftNav=1" <?php if( $LeftNav == 1 ) {
        echo 'class="active"';
      } ?> >View Users</a></li>
    <?php
    if( $current_user->admin ) {
      echo '<li><a href="add_user.php?LeftNav=2"';
      if( $LeftNav == 2 ) {
        echo 'class="active"';
      }
      echo '>Add New User</a></li>';
    }
    ?>
    <li><a href="add_content.php?LeftNav=3" <?php if( $LeftNav == 3 ) {
        echo 'class="active"';
      } ?> >Add Content</a></li>
    <li><a href="view_pages.php?LeftNav=4" <?php if( $LeftNav == 4 ) {
        echo 'class="active"';
      } ?> >View Pages</a></li>
  </ul>
</div>


<!-- This is just test of some plugins (token)
<div class="dropDownWithSearchContainer">
  <select class="dropDownWithSearch">
    <option value="AL">Alabama</option>
    <option value="NPL" selected>Nepal</option>
    <option value="WY">Wyoming</option>
  </select>
  <select class="goToZoo" multiple></select>
</div>-->