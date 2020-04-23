<?php
/**
 * 
 * Foundation
 * 
 */

/** Define the main path of the application */
define("MAIN_PATH", dirname(__FILE__) . "/");

/** Start application */
require("includes/dbcon.php");
require("includes/router.php");
require("includes/functions.php");
require("includes/layout.php");

function start_db() {
    global $dbcon;

    if(isset($dbcon)) {
        return;
    }

    $dbhost = defined("DB_HOST") ? DB_HOST : "";
    $dbname = defined("DB_NAME") ? DB_NAME : "";
    $dbuser = defined("DB_USER") ? DB_USER : "";
    $dbpass = defined("DB_PASS") ? DB_PASS : "";
    
    $dbcon = new dbcon($dbhost, $dbuser, $dbpass, $dbname);
}

global $dbcon;
start_db();