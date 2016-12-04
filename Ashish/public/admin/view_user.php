<?php
require_once "../../includes/initialize.php";

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

              <!-- Edit and delete messages -->
              <?php if( isset( $_SESSION['deleteMessage'] ) ) {
                echo session::delete_message();
              } ?>
              <?php if( isset( $_SESSION['editMessage'] ) ) {
                echo session::edit_message();
              } ?>
              <!-- Edit and delete messages ends -->
              <div class="deleteMessage currentUserDeleteMessage"></div>
              
              <?php $all_users = user::find_all() ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $increment = 1;
                  foreach( $all_users as $user ) {
                    $user->username = $user->admin ? $user->username . " (main)" : $user->username;
                    ?>
                    <tr id="<?= $user->id ?>">
                      <td><?= $increment++ ?></td>
                      <td><?= htmlentities($user->username) ?></td>
                      <td><?= htmlentities($user->email) ?></td>
                      <td><a href="edit_user.php?edit=<?= htmlentities($user->id) ?>">Edit</a></td>
                      <td>
                        <a class="toggle-popup" href="#" onclick="delete_unique_user(<?= htmlentities($user->id).','.$current_user->admin ?>)">Delete</a>
                      </td>
                    </tr>
                    <?php
                  } ?>
                  </tbody>
                </table>
              </div>

              <!--<p class="toggle-popup">Click Me For Popup</p>-->
              <div class="pop-up-container">
                <div class="pup-up">
                  <div class="content">
                    <p>Are you sure?</p>
                    <p>This will permanently delete your data</p>
                    <button class="toggle-popup delete-user">Delete</button>
                    <button class="toggle-popup cancel-user">Cancel</button>
                  </div>
                </div>
              </div>

            </section>

          </div>
        </div>
      </div>
    </div>

    <?php include_layout_admin("foot.php"); ?>
  </div>
<?php include_layout_admin("admin_footer.php"); ?>