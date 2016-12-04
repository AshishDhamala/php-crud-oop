<?php
function has_presence($value) {
  return isset( $value ) && $value !== "";
}

function validate_presence($required_fields) {
  global $errors;
  foreach( $required_fields as $key => $field ) {
    $value = trim($_POST[$key]);
    if( !has_presence($value) ) {
      $errors[$value] = $value . " can't be blank.";
    }
  }
}

function is_greater_than_max_length($string, $max) {
  return strlen($string)>$max;
}

function validate_max_length($fields_with_max_length) {
  global $errors;
  foreach( $fields_with_max_length as $field => $max ) {
    $value = trim($_POST[$field]);
    if( is_greater_than_max_length($value, $max) ) {
      $errors[$value] = $value . " is too long.";
    }
  }
}

function is_in_array($string, $array) {
  return in_array($string, $array);
}

function form_errors($errors = array()) {
  $output = "";
  if( !empty( $errors ) ) {
    $output .= "<div class='formValidationErrorMessage'>";
    $output .= "<ul>";
    foreach( $errors as $key => $error ) {
      $output .= "<li>{$error}</li>";
    }
    $output .= "</ul></div>";
  }
  return $output;
}