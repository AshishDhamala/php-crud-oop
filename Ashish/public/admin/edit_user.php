<?php
require_once "../../includes/initialize.php";

if( !$session->is_logged_in() ) {
  redirect_to("login.php");
}
$id = $_SESSION['user_id'];
$current_user = user::find_by_id($id);
$user_to_be_edited = user::find_by_id($database->escape_value($_GET['edit']));
$message = "";

if( !$current_user->admin ) {
  $_SESSION['editMessage'] = "You are not authorized to edit users.";
  redirect_to("view_user.php?LeftNav=1");
}

if( isset( $_POST['update'] ) ) {
  $user = new user();
  $username = htmlentities($_POST['username']);
  $email = htmlentities($_POST['email']);
  $password = $_POST['password'];

  $user->id = $user_to_be_edited->id;
  $user->admin = isset( $_POST['root_admin'] ) ? 1 : 0;
  $user->username = ( !isset( $username ) || $username == "" ) ? $user_to_be_edited->username : $username;
  $user->email = ( !isset( $email ) || $email == "" ) ? $user_to_be_edited->email : $email;
  $user->password = ( !isset( $password ) || $password == "" ) ? $user_to_be_edited->password : $password;

  // This is done so that after updating the name shown in the input fields will change according to the updated values
  $user_to_be_edited->username = $user->username;
  $user_to_be_edited->email = $user->email;
  $user_to_be_edited->admin = $user->admin;

  $user->update();
  $_SESSION['editMessage'] = "Successfully updated {$user_to_be_edited->username}.";

}

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

              <div class="editUserForm col-sm-12 noPadding">
                <!-- <form action="../../includes/add_user.php" method="post" class="col-sm-offset-4 col-sm-4 noPadding"> -->
                <form action="edit_user.php?edit=<?php echo $user_to_be_edited->id; ?>" method="post" class="col-sm-offset-4 col-sm-4 noPadding">
                  <?php if( isset( $_SESSION['editMessage'] ) ) {
                    echo session::edit_message();
                  } ?>
                  <h3 class="formHead">Edit User</h3>
                  <div class="formBody">
                    <div class="form-group">
                      <label>Username:</label>
                      <input type="text" name="username" class="form-control" value="<?php echo $user_to_be_edited->username; ?>">
                    </div>

                    <div class="form-group">
                      <label>Email:</label>
                      <input type="email" name="email" class="form-control" value="<?php echo $user_to_be_edited->email; ?>">
                    </div>

                    <div class="form-group">
                      <label>Password:</label>
                      <input type="password" name="password" class="form-control">
                    </div>

                    <div class="checkbox">
                      <label><input type="checkbox" name="root_admin" <?php if( $user_to_be_edited->admin ) {
                          echo "checked";
                        } ?> >Root Admin</label>
                    </div>

                    <input type="submit" name="update" class="btn btn-primary saveUser" value="Update">
                  </div>
                  <br>
                  <?php if( !isset( $_POST['update'] ) ) {
                    echo temp_message("If fields are empty, previous values will be asigned automatically.");
                  } ?>
                </form>
              </div>

            </section>
          </div>
        </div>
      </div>
    </div>


    <?php include_layout_admin("foot.php"); ?>
  </div>
<?php include_layout_admin("admin_footer.php"); ?>