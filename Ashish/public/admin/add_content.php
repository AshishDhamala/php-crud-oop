<?php
require_once "../../includes/initialize.php";

if( !$session->is_logged_in() ) {
  redirect_to("login.php");
}
$id = $_SESSION['user_id'];
$current_user = user::find_by_id($id);
$message = "";

$fileUploadErrors = "";

require_once "../../includes/form_validaton_function.php";
if( isset( $_POST['submit'] ) ) {

  $page_title = $_POST['title'];
  $page_content = $_POST['content'];
  $page_labels = $_POST['labels'];

  if( !has_presence($page_title) ) {
    $message .= "Title field cannot be empty.<br />";
    $message .= $page_labels."<br />";
  }
  if( !has_presence($page_content) ) {
    $message .= "Content field cannot be empty.<br />";
  }
  if( $_FILES['fileToUpload']['error'] == 4 ) {
    $message .= "You must choose a file to upload.<br />";
  }

  if( $message === "" ) {
    // For image that is to be uploaded
    $target_dir = "../images/";
    $file_name = str_replace(" ", "_", basename($_FILES["fileToUpload"]["name"]));
    $target_file = $target_dir . $file_name;
    //$file_name = basename($_FILES["fileToUpload"]["name"]);  // In this case it is name of image with its extension.
    $uploadOk = 0;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if( $check !== false ) {
      //echo "File is an image - " . $check["mime"] . "."."<br />";
      $uploadOk = 1;
    } else {
      $message .= "File is not an image.<br />";
      $uploadOk = 0;
    }

    // Check if file already exists
    if( file_exists($target_file) ) {
      $message .= "Sorry, image already exists. Try to upload another image.<br />";
      $uploadOk = 0;
    }

    // Check file size
    if( $_FILES["fileToUpload"]["size"]>5120000 ) {
      $message .= "Sorry, your file is too large. You can only upload image of size less than 5MB.<br />";
      $uploadOk = 0;
    }

    // Allow certain file formats
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if( $imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif" ) {
      $message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br />";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if( $uploadOk == 0 ) {
      $message .= "Submission unsuccessful.<br />";

      // if everything is ok, try to upload file
    } else {

      if( move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ) {
        $post = new Contents;
        $post->title = $page_title;
        $post->image_name = $file_name;

        $post->content = $page_content;
        if( $post->create() ) {
          // Creating another page
          $post->create_complete_page();
        }
        $message .= "You have successfully added post.";
        session::tempo_message("You have successfully added post.");
        redirect_to("add_content.php?LeftNav=3");
      } else {
        $message .= "Sorry, there was an error uploading your file." . "<br />";
      }
    }

  }

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
            <!-- message -->
            <?php echo isset( $_POST['submit'] ) ? session::temp_message($message) : "" ?>
            <?= session::tempo_message(); ?>
            <form action="add_content.php?LeftNav=3" method="post" role="form" enctype="multipart/form-data">

              <div class="form-group">
                <label for="title">Title:</label>
                <input id="title" type="text" name="title" class="form-control" value="<?php echo isset( $_POST['title'] ) ? $_POST['title'] : "" ?>">
              </div>

              <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" class="form-control" rows="5" name="content"><?php echo isset( $_POST['content'] ) ? $_POST['content'] : "" ?></textarea>
                <script>
                  CKEDITOR.replace('content');
                </script>
              </div>

              <!-- This field is not yet added to the database -->
              <div class="form-group">
                <label for="labels">Labels:<small> (This field is not yet added to the database)</small></label>
                <input id="labels" type="text" name="labels" class="form-control" value="<?php echo isset( $_POST['labels'] ) ? $_POST['labels'] : "" ?>">
              </div>

              <div class="form-group">
                <label for="labels2">Labels:<small> (This field is not yet added to the database)</small></label>
                <select id="labels2" name="labels2" class="goToZoo form-control" multiple></select>
              </div>

              <div class="form-group">
                <label>Upload Image:</label>
                <input type="file" name="fileToUpload">
              </div>

              <button type="submit" name="submit" class="btn btn-success">Save</button>

            </form>
          </section>

        </div>
      </div>
    </div>
  </div>

  <?php include_layout_admin("foot.php"); ?>
</div>
<?php include_layout_admin("admin_footer.php"); ?>
