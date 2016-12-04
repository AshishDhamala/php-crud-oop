<div class="contentLeft col-sm-12 noPadding">

  <img class="coverPic" src="images/wide.jpg" alt="over page">

  <div class="homePost col-sm-12 noPadding clearfix">
    <div class="imageThumbnail">
      <img src="images/3.jpg" alt="Thumbnail"/>
    </div>
    <!-- Just a demo content -->
    <div class="homePostContent">
      <h3><a href="pages/complete_page.php">Not dynamic</a></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, atque, nisi. Dolorem modi, placeat perspiciatis quaerat, eveniet, fugit quam beatae numquam repellat iure blanditiis velit, sint mollitia aliquid quasi eos molestiae ratione quibusdam asperiores quae praesentium sit nostrum. Repellat provident eaque explicabo id nam tenetur, neque excepturi distinctio. Incidunt aut ad, voluptatum cupiditate praesentium saepe provident, eum omnis temporibus deserunt repellat sit quos. Repudiandae voluptate nisi ipsa quos earum architecto dignissimos harum aliquam aut beatae sint.</p>
    </div>
    <div class="homePostFooter">
      <p>Share:</p>
      <div>
        <a href="#"><span class="fa fa-facebook-square" title="Facebook"></span></a>
        <a href="#"><span class="fa fa-twitter-square" title="Twitter"></span></a>
        <a href="#"><span class="fa fa-youtube-square" title="YouTube"></span></a>
        <a href="#"><span class="fa fa-linkedin-square" title="LinkedIn"></span></a>
      </div>
    </div>
  </div>
  <?php
  // Displaying all the contents of the page with limit.
  $limit = 10;

  $all_contents = Contents::find_all_with_limit($limit);
  // $all_contents = Contents::find_all();
  foreach ($all_contents as $post) {
    $page_title = urlencode($post->title);
    $image_path = "/MyProjectsWithPHP/Ashish/public/images/" . $post->image_name;
    ?>
    <div class="homePost col-sm-12 noPadding clearfix">
      <div class="imageThumbnail"><img src="<?= $image_path ?>" alt="Thumbnail"></div>
      <div class="homePostContent">
        <h3><a href="pages/<?= $page_title ?>.php"><?= htmlspecialchars($post->title) ?></a></h3>
        <p><?= substr($post->content, 0, 500) ?><a href="pages/<?= $page_title ?>.php">... Read More ...</a></p>
      </div>
      <!--Share block below every Posts-->
      <div class="homePostFooter">
        <p>Share:</p>
        <div>
          <a href="#"><span class="fa fa-facebook-square" title="Facebook"></span></a>
          <a href="#"><span class="fa fa-twitter-square" title="Twitter"></span></a>
          <a href="#"><span class="fa fa-youtube-square" title="YouTube"></span></a>
          <a href="#"><span class="fa fa-linkedin-square" title="LinkedIn"></span></a>
        </div>
      </div>
    </div>
    <?php
  }
  ?>


  <?php
  /*echo __DIR__ . "<br />";
  echo __File__ . "<br />";

  echo  "<hr />";
  echo file_exists(__FILE__) ? "yes" : "no";
  echo  "<br />";
  echo file_exists(__DIR__) ? "yes" : "no";
  echo  "<br />";
  echo file_exists(__DIR__."/content_right.php") ? "yes" : "no";
  echo  "<br />";

  echo  "<hr />";
  echo is_file(__DIR__."/content_right.php") ? "yes" : "no";
  echo  "<br />";
  echo is_file(__DIR__) ? "yes" : "no";
  echo  "<br />";

  echo  "<hr />";
  echo is_dir(__DIR__."/content_right.php") ? "yes" : "no";
  echo  "<br />";
  echo is_dir(__DIR__) ? "yes" : "no";
  echo  "<br />";
  echo is_dir("..") ? "yes" : "no";
  echo  "<br />";*/
  ?>
</div>