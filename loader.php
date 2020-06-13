<?php
/**
 * 
 * This script uses the URL to load the correct layout script
 * 
 */

$routes = array(
  '/' => 'content/layout/index.php',
  '/profile' => 'content/layout/profile.php',
  '/search' => 'content/layout/search.php'
);

if(defined("SITE_HOME")) {
  $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $path = substr($url, strlen(SITE_HOME));

  if($path == '/') {
    require('content/layout/index.php');
  } else {
    $path = explode("/", $path);
    foreach($routes as $route => $file) {
      if($route == "/$path[1]") {
          require($file);
      }
    }
  }
} else {
  require('content/layout/404.php');
}