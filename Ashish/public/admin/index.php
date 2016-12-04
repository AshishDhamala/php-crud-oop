<?php
require_once( "../../includes/initialize.php" );

if( !$session->is_logged_in() ) {
  redirect_to("login.php");
}
$id = $_SESSION['user_id'];
$current_user = user::find_by_id($id);
?>
<?php include_layout_admin("admin_header.php"); ?>
  <div class="myContainer">

    <?php include_layout_admin("admin_navigation.php"); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 noPadding">
          <div class="content col-sm-12 noPadding">

            <aside class="col-sm-2 noPadding">
              <?php include_layout_admin("admin_left_nav.php"); ?>
            </aside>

            <section class="right col-sm-10">
              <h2>Welcome to admin page, <?php echo $current_user->username; ?></h2>
            </section>

          </div>
        </div>
      </div>
    </div>
    <?php include_layout_admin("foot.php"); ?>

  </div>
<?php include_layout_admin("admin_footer.php"); ?>