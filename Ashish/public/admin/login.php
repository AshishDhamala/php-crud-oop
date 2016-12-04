<?php

require_once "../../includes/initialize.php";

if( $session->is_logged_in() ) {
  redirect_to("index.php");
}

$email = "";
$message = "";
if( isset( $_POST['submit'] ) ) {
  // form is submitted
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Check database if the email and password exist
  $found_user = user::authenticate($email, $password);

  if( $found_user ) {
    $session->login($found_user);
    redirect_to("index.php");
    // $_SESSION['message'] = "Successful.";
  } else {
    $message = "*Username/Password combination was incorrect.";
  }
} /* else {
	// form is not submitted
	$email = "";
	$password = "";
}*/

?>


<?php include_layout_admin("admin_header.php"); ?>

<div id="login" class="col-sm-12 noPadding">
  <form action="login.php" method="post" class="col-sm-offset-4 col-sm-4 col-xs-offset-2 col-xs-8 form">
    <h3>Login</h3>
    <hr>
    <div class="form-group">
      <label>Email:</label>
      <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
    </div>

    <div class="form-group">
      <label>Password:</label>
      <input type="password" name="password" class="form-control">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Login">
    <?php
    if( !empty( $message ) ) {
      echo "<br /><br /><p style=\"color: red; font-size: 12px;\">{$message}</p>";
    }
    ?>
  </form>
</div>

<?php include_layout_admin("admin_footer.php"); ?>
