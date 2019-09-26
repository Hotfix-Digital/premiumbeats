<?php
/**
 * 
 * Foundation
 * 
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/** Define the name of the application */
define("SITE_NAME", "Premium Beats");

/** Define the main path of the application */
define("MAIN_PATH", dirname(__FILE__) . "/");

/** Load configuration file */
require_once(MAIN_PATH . "config.php");