<?php
/**
 * 
 * Everything needed to make the layout work
 * 
 */

function get_header() {
    include("content/layout/header.php");
}

function get_footer() {
    include("content/layout/footer.php");
}

function get_layout_home() {
    include("content/layout/index.php");
}

function is_home() {
    return true;
}

if(is_home()) {
    get_layout_home();
}

