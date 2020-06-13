<?php
/**
 * Configuration settings
 * 
 * @notice: Avoid making changes to this file
 */

/** Site Options */
define("SITE_HOME", "http://localhost/premiumbeats");
define("SITE_NAME", "Premium Beats");

 /** Define database host */
define("DB_HOST", "154.0.161.161");

/** Define database schema */
// define("DB_NAME", "premiqbo_main");
define("DB_NAME", "premiqbo_main");

/** Define database user */
// define("DB_USER", "premiqbo_user");
define("DB_USER", "premiqbo_user");

/** Define database password */
// define("DB_PASS", "R4FNOZPxdf");
define("DB_PASS", "R4FNOZPxdf");

/** Error Reporting */
error_reporting(E_ALL);

/** Display Errors */
ini_set("display_errors", 1);

/** Debug Mode */
define("DEBUG_MODE", true);

/** Current URL */
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

/** Start application */
require("load.php");