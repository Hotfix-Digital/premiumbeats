<?php
/**
 * 
 * Everything needed to make the layout work
 * 
 */

$routing = new routing;
 
function get_header() {
    require("content/layout/header.php");
}

function get_footer() {
    require("content/layout/footer.php");
}

function is_search() {
    global $routing;

    return $routing->is_search();
}

function is_404() {
    global $routing;

    return $routing->is_404();
}

function is_page() {
    global $routing;

    if(!isset($routing)) {
        return false;
    }

    return $routing->is_page();
}

function is_home() {
<<<<<<< HEAD
    return false;
}

if(is_home()) {
    get_layout_home();
} else {
    get_layout_404();
=======
    global $routing;

    if(!isset($routing)) {
        return false;
    }

    return $routing->is_home();
}

function load_layout() {
    require_once("content/layout/index.php");
>>>>>>> 91f53103a176680471c2465a13c0533d7bf089aa
}

