<?php
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'MyProjectsWithPHP' . DS . 'From Lynda OOP');

include_once "database.php";
include_once "DatabaseCommon.php";

class Contents extends DatabaseCommon
{
  protected static $table_name = "contents";
  public static $database_fields = ["title", "content", "image_name"];
  public $id;
  public $title;
  public $content;
  public $image_name;

  public function create_complete_page() {

    // $file_storage_path will give the path where files are stored
    $file_storage_path = SITE_ROOT . DS . "public" . DS . "pages" . DS;
    // $fileTitle is complete location of file with its title. Title is extracted and stored in the $file_storage_path
    $fileTitle = $file_storage_path . urlencode($this->title) . ".php";

    // I have created this variable so that I could use it in the links of headings of each file created
    $fileSelfLink = urlencode($this->title) . ".php";

    if( $handle = fopen($fileTitle, 'w') ) {

      // Converting br tags into paragraphs
      // Splitting the content if there is any line break. The splitted string are stored as array in $splittedContent
      /*$splittedContent = preg_split("/[\n\r]+/", $this->content);
      $finalContent = "";
      foreach( $splittedContent as $key => $value ) {
        if( $value != "" ) {
          // Wrapping those splitted contents in p tags
          $finalContent .= "<p class=\"pagePostContentParagraph\">$value</p>";
        }
      }*/

      $output = "<?php require_once(\"../../includes/initialize.php\"); ?>";
      $output .= "<?php include_layout(\"page_header_top.php\"); ?>";
      $output .= "<title>" . htmlentities($this->title) . "</title>";
      $output .= "<?php include_layout(\"page_header_bottom.php\"); ?>";
      $output .= "<div class=\"myContainer\">";
      $output .= "<?php include_layout(\"navigation.php\"); ?>";
      $output .= "<div class=\"content\">";
      $output .= "<div class=\"container-fluid\">";
      $output .= "<div class=\"row\">";
      $output .= "<div class=\"col-sm-12 noPadding\">";
      $output .= "<section class=\"col-sm-9\">";

      // This is the part of complete_page_left.php
      $image_path = "/MyProjectsWithPHP/Ashish/public/images/" . $this->image_name;
      // Starts
      $output .= "<div class=\"completePageLeft col-sm-12 noPadding\">";
      $output .= "<div class=\"pagePost col-sm-12 noPadding clearfix\">";
      $output .= "<div class=\"pagePostHeader col-sm-12 noPadding\">";
      $output .= "<h2><a href=\"" . $fileSelfLink . "\">" . htmlentities($this->title) . "</a></h2>";
      $output .= "</div>";
      $output .= "<div class=\"pagePostContent col-sm-12 noPadding\">";
      $output .= "<div class=\"pagePostContentImage col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4 noPadding\">";
      $output .= "<img src=\"" . $image_path . "\" alt=\"" . htmlentities($this->title) . " \" title=\"" . htmlentities($this->title) . "\" />";
      $output .= "<p class=\"pagePostContentImageLabel\">" . htmlentities($this->title) . " </p>";
      $output .= "</div>";
      $output .= "<div class=\"col-sm-12 noPadding\">" . $this->content . "</div>";
      $output .= "</div>";
      $output .= "<div class=\"pagePostFooter col-sm-12 noPadding\">";
      $output .= "<p class=\"pagePostFooterLabel\">Share:</p>";
      $output .= "<div class=\"pagePostFooterLinks\">";
      $output .= "<a href=\"http://www.facebook.com\"><span class=\"fa fa-facebook-square\" title=\"Facebook\"></span></a>";
      $output .= "<a href=\"http://www.twitter.com\"><span class=\"fa fa-twitter-square\" title=\"Twitter\"></span></a>";
      $output .= "<a href=\"http://www.youtube.com\"><span class=\"fa fa-youtube-square\" title=\"YouTube\"></span></a>";
      $output .= "<a href=\"http://www.linkedin.com\"><span class=\"fa fa-linkedin-square\" title=\"LinkedIn\"></span></a>";
      $output .= "</div></div></div></div>";
      // Ends

      $output .= "</section>";
      $output .= "<aside class=\"col-sm-3\">";
      $output .= "<?php include_layout(\"content_right.php\"); ?>";
      $output .= "</aside></div></div></div></div>";
      $output .= "<?php include_layout(\"foot.php\"); ?>";
      $output .= "</div>";
      $output .= "<?php include_layout(\"page_footer.php\"); ?>";

      fwrite($handle, $output);
      /*if ($size = file_put_contents($fileTitle, $output)) {
        echo "File size = $size.";
      }*/
      fclose($handle);

    } else {
      echo "File write error.";
    }
  }

}
