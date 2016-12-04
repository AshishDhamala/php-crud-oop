<?php
require_once "../../includes/initialize.php";

if (!$session->is_logged_in()) {
  redirect_to("login.php");
}
$id = $_SESSION['user_id'];
$current_user = user::find_by_id($id);
// echo $current_user->admin;
/*if (isset($_GET['del']) && $current_user->admin) {
  $content = new Contents();
  $content->id = $_GET['del'];
  $content_to_be_deleted = Contents::find_by_id($_GET['del']);

  if ($content->delete()) {
    $page_dir = "../pages/" . urlencode($content_to_be_deleted->title) . ".php";
    unlink($page_dir);
    $image_dir = "../images/" . $content_to_be_deleted->image_name;
    unlink($image_dir);
  }
}*/





// Deletion of file test
/*$file_dir = "../pages/". "Christmas+again" . ".php";
if(unlink( $file_dir )){
  echo "successfully deleted";
}else{
  echo "deletion unsuccessful";
}*/

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
              <?php if (isset($_SESSION['deleteMessage'])) {
                echo session::delete_message();
              } ?>
              <?php if (isset($_SESSION['editMessage'])) {
                echo session::edit_message();
              } ?>
              <!-- Edit and delete messages ends -->
              <div class="deleteMessage currentPageDeleteMessage"></div>

              <div class="displayPagesForAdmin col-sm-12 noPadding">
                <?php
                $all_contents = Contents::find_all();
                foreach ($all_contents as $content) {
                  $fileSelfLink = "/MyProjectsWithPHP/Ashish/public/pages/" . urlencode($content->title) . ".php";
                  $image_path = "/MyProjectsWithPHP/Ashish/public/images/" . $content->image_name;
                  ?>
                  <ul id="<?= $content->id ?>">
                    <!--<li><a href="view_pages.php?del=<?/*= $content->id */ ?>">Delete Page</a></li>-->
                    <li><a class="toggle-popup" href="#" onclick="delete_page(<?= htmlentities($content->id).','.$current_user->admin ?>)">Delete Page</a></li>
                    <li>
                      <a class='public_page_from_admin_page' href="<?= $fileSelfLink ?>">Title: <?= htmlentities($content->title) ?></a>
                    </li>
                    <li><img src='<?= $image_path ?>'/></li>
                    <li>Content: <?= substr($content->content, 0, 100) ?></li>
                  </ul>
                  <?php
                }
                ?>
              </div>

              <!--<p class="toggle-popup">Click Me For Popup</p>-->
              <div class="pop-up-container">
                <div class="pup-up">
                  <div class="content">
                    <p>Are you sure?</p>
                    <p>This will permanently delete your data</p>
                    <button class="toggle-popup delete-page">Delete</button>
                    <button class="toggle-popup cancel-page">Cancel</button>
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