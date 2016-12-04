<?php require_once "../includes/initialize.php"; ?>

<?php include_layout("header.php"); ?>

  <div class="myContainer">
    <?php include_layout("navigation.php"); ?>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 noPadding">

            <section class="col-sm-9">
              <?php include_layout("content_left.php"); ?>
            </section>

            <aside class="col-sm-3">
              <?php include_layout("content_right.php"); ?>
            </aside>

          </div>
        </div>
      </div>
    </div>

    <?php include_layout("foot.php"); ?>
  </div>

<?php include_layout("footer.php"); ?>