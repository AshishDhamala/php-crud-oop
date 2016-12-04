<?php

class form
{
  public $errors = array();

  public function errors() {
    $output = "";
    if( !empty( $this->errors ) ) {
      $output .= "<div class='formValidationErrors'>";
      $output .= "<p>Please solve the following errors:</p>";
      $output .= "<ul>";
      foreach( $this->errors as $error ) {
        $output .= "<li>{$error}</li>";
      }
      $output .= "</ul></div>";
    }
    return $output;
  }

  public function formValue($field = "") { return isset( $_POST[$field] ) ? $_POST[$field] : ""; }


  private function hasPresence($value = "") { return isset( $value ) && $value !== ""; }

  public function authenticatePresence($required_fields = array()) {
    foreach( $required_fields as $field ) {
      $value = trim($_POST[$field]);
      if( !$this->hasPresence($value) ) {
        $this->errors[] = ucfirst($field) . " cannot be empty.";
      }
    }
  }


  private function greaterThanMaxLength($string, $length) { return strlen($string)>$length; }

  public function authenticateMaxLength($max_length_fields = array()) {
    foreach( $max_length_fields as $field => $length ) {
      $value = trim($_POST[$field]);
      if( $this->greaterThanMaxLength($value, $length) ) {
        $this->errors[] = ucfirst($field) . " cannot be more than {$length} characters.";
      }
    }
  }


  private function lessThanMinLength($string, $length) { return strlen($string)<$length; }

  public function authenticateMinLength($min_length_fields = array()) {
    foreach( $min_length_fields as $field => $length ) {
      $value = trim($_POST[$field]);
      if( $this->lessThanMinLength($value, $length) && $value != "" ) {
        $this->errors[] = ucfirst($field) . " cannot be less than {$length} characters.";
      }
    }
  }


  public function authenticateEmail($field = "") {
    $email = $_POST[$field];
    if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
      if( $email != "" ) {
        $this->errors[] = "Invalid email format.";
      }
    }
  }

  private function calculateSize($size = 0) {
    if( $size>=1073741824 ) {
      $size = number_format($size / 1073741824, 2) . ' GB';
    } elseif( $size>1048576 ) {
      $size = number_format($size / 1048576, 2) . ' MB';
    } elseif( $size>1024 ) {
      $size = number_format($size / 1024, 2) . ' KB';
    } elseif( $size>1 ) {
      $size .= " Bytes";
    }
    return $size;
  }

  public function authenticateFile($field = "") {
    $upload_errors = array(UPLOAD_ERR_INI_SIZE   => "The file is larger than upload_max_filesize which is 5 MB for now.",
                           UPLOAD_ERR_FORM_SIZE  => "The file is larger than " . $this->calculateSize($_POST['MAX_FILE_SIZE']),
                           UPLOAD_ERR_PARTIAL    => "The file was partially uploaded.",
                           UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
                           UPLOAD_ERR_NO_TMP_DIR => "Temporary folder is missing.",
                           UPLOAD_ERR_CANT_WRITE => "TCan't write to disk.",
                           UPLOAD_ERR_EXTENSION  => "File upload stopped by a php extension.");

    $error = $_FILES[$field]['error'];
    // We can also write 0 instead of UPLOAD_ERR_OK below.
    if( $error != UPLOAD_ERR_OK ) {
      $this->errors[] = $upload_errors[$error];
    }

  }

}

$form = new form();

/*if( isset( $_POST['submit'] ) ) {
  $fields_to_be_present = array("username", "email");
  $max_length = array("username" => 15, "email" => 15);
  $min_length = array("username" => 2, "email" => 2);

  $form->authenticatePresence($fields_to_be_present);
  $form->authenticateMaxLength($max_length);
  $form->authenticateMinLength($min_length);
  $form->authenticateEmail('email');
  $form->authenticateFile('file');

  if( empty( $form->errors() ) ) {
    echo "good";
  } else {
    echo $form->errors();
  }
}*/


?>

<!--<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form</title>
</head>
<body>

<form action="form.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="MAX_FILE_SIZE" value="4194304">

  <label>Username:<br>
    <input type="text" name="username" value="<?php /*echo $form->formValue("username"); */ ?>">
  </label><br>

  <label>Email:<br>
    <input type="text" name="email" value="<?php /*echo $form->formValue("email"); */ ?>">
  </label><br><br>

  <input type="file" name="file"><br><br>

  <input type="submit" name="submit"><br>
</form>

</body>
</html>-->
