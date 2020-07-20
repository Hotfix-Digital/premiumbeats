<?php
function url_to_postid($url) {
    $routing = new routing;

    $host_url = str_replace('www.', '', parse_url($url, PHP_URL_HOST));
    $home_url = str_replace('www.', '', parse_url(SITE_HOME, PHP_URL_HOST));
}
