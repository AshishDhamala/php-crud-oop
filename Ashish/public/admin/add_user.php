<?php
require_once "../../includes/initialize.php";

if( !$session->is_logged_in() ) {
  redirect_to("login.php");
}

$id = $_SESSION['user_id'];
$current_user = user::find_by_id($id);
$message = "";
$username = "";
$email = "";
if( !empty( $_POST['username'] ) && !empty( $_POST['email'] ) && !empty( $_POST['password'] ) && !empty( $_POST['confirm_password'] ) && !empty( $_POST['save'] ) && $current_user->admin ) {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if( $password === $confirm_password ) {
    $new_user = new user;
    $new_user->admin = isset( $_POST['root_admin'] ) ? 1 : 0;
    $new_user->username = htmlentities($username);
    $new_user->email = htmlentities($email);
    //$new_user->password = $password;
    $new_user->password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    $new_user->create();
    $message = "$username was successfully added to the database.";
  } else {
    $message = "Your password didn't match. Please try again.";
  }
} elseif( !$current_user->admin ) {
  $message = "You are not authorized to add or add new user.";
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

              <div class="addUserForm col-sm-12 noPadding">
                <form action="add_user.php" method="post" class="col-sm-offset-4 col-sm-4 noPadding">
                  <?php if( isset( $_POST['save'] ) ) {
                    echo temp_message($message);
                  } ?>
                  <h3 class="formHead">Add User</h3>
                  <div class="formBody">
                    <div class="form-group">
                      <label>Username:</label>
                      <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required="required">
                    </div>

                    <div class="form-group">
                      <label>Email:</label>
                      <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required="required">
                    </div>

                    <div class="form-group">
                      <label>Password:</label>
                      <input type="password" name="password" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                      <label>Confirm Password:</label>
                      <input type="password" name="confirm_password" class="form-control" required="required">
                    </div>

                    <div class="checkbox">
                      <label><input type="checkbox" name="root_admin">Root Admin</label>
                    </div>

                    <input type="submit" name="save" class="btn btn-primary saveUser" value="Save">
                  </div>
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