<?php

function strip_zeros_from_data($marked_string = "") {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to($location = NULL) {
  if( $location != NULL ) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message = "") {
  if( !empty( $message ) ) {
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

function temp_message($message = "") {
  if( $message !== "" ) {
    return "<p class=\"tempMessage\">{$message}</p>";
  } else {
    return "";
  }

}

function include_layout($template = "") {
  include_once SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . $template;
}

function include_layout_admin($template = "") {
  include_once SITE_ROOT . DS . 'public' . DS . 'admin' . DS . 'layouts' . DS . $template;
}


// Just to show the values of form after the user has submitted the form
// Works only for POST type submission
function form_value($field = "") {
  return isset( $_POST[$field] ) ? $_POST[$field] : "";
}