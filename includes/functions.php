<?php

function init() {
    // Do something
}

function show_title() {
    echo("<title>" . get_title() . "</title>");
}

function get_title() {
    $title = '';

    if(path_404()) {
        $title = "Page Not Found";
    } elseif(path_search()) {
        $title = "Search results for ";
    } elseif(path_home()) {
        $title = SITE_NAME;
    } elseif(path_post()) {
        $title = ""; // Get post title
    } else {
        $title = "Unknown Title";
    }

    return $title;
}