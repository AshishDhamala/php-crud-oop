<?php

defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'MyProjectsWithPHP' . DS . 'Ashish');
defined('LIB_PATH') ? NULL : define('LIB_PATH', SITE_ROOT . DS . 'includes');

// load config first
require_once( LIB_PATH . DS . 'config.php' );

// load basic function next so that everything after them can use
require_once( LIB_PATH . DS . 'functions.php' );

// load core objects
require_once( LIB_PATH . DS . 'session.php' );
require_once( LIB_PATH . DS . 'database.php' );

// load database related classes
require_once( LIB_PATH . DS . 'user.php' );
require_once( LIB_PATH . DS . 'content.php' );
