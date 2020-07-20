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

function get_layout_404() {
    include("content/layout/404.php");
}

function get_layout_home() {
    include("content/layout/index.php");
}

function get_layout_post() {
    include("content/layout/post.php");
}

function get_layout_search() {
    include("content/layout/search.php");
}

function is_home() {
    return false;
}

if(is_home()) {
    get_layout_home();
} else {
    get_layout_404();
}

