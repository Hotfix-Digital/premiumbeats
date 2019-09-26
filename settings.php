<?php
/**
 * 
 * Application settings
 * 
 */


/** Define path for application assets */
define("SITE_ASS", MAIN_PATH . "assets");

/** Define path for basic content */
define("SITE_CON", MAIN_PATH . "content");

/** Define path for core content */
define("SITE_INC", MAIN_PATH . "includes");


/** Start application */
require_once(dirname(__FILE__) . "/includes/load.php");
require_once(dirname(__FILE__) . "/includes/functions.php");
require_once(dirname(__FILE__) . "/includes/layout.php");