<?php
/**
 * 
 * Foundation
 * 
 */

/** Start application */
require("includes/composition.php");
require("includes/functions.php");
require("includes/routing.php");
require("includes/layout.php");

function start_db() {
    global $dbcon;

    require_once("includes/dbcon.php");

    if(isset($dbcon)) {
        return;
    }

    $dbhost = defined("DB_HOST") ? DB_HOST : "";
    $dbname = defined("DB_NAME") ? DB_NAME : "";
    $dbuser = defined("DB_USER") ? DB_USER : "";
    $dbpass = defined("DB_PASS") ? DB_PASS : "";
    
    $dbcon = new dbcon($dbhost, $dbuser, $dbpass, $dbname);
}

function get_extensions() {
    $extensions = array();
    if(!is_dir("content/extensions")) {
        return $extensions;
    }

    $dir = opendir("content/extensions");

    if(!$dir) {
        return $extensions;
    }

    while(($extension = readdir($dir)) !== false) {
        if(substr($extenstion, -4) == '.php') {
            $extensions[] = "content/extenstion/" . $extension;
        }
    }

    closedir($dir);

    return $extensions;
}

global $dbcon;
start_db();

