<?php
/**
 * 
 * This script uses the URL to load the correct layout script
 * 
 */

$routes = array(
  '/' => 'content/layout/index.php',
  'index' => 'content/layout/index.php',
  'profile' => 'content/layout/profile.php',
  'search' => 'content/layout/search.php',
  'gallery' => 'content/layout/gallery.php',
  'profile' => 'content/layout/profile.php',
  'mixes' => 'content/layout/mixes.php',
  'voice-overs' => 'content/layout/voice-overs.php',
  'bookings' => 'content/layout/bookings.php',
  'privacy' => 'content/layout/privacy.php'
);

$uri = isset($_GET['route']) ? $_GET['route'] : "/";

foreach($routes as $route => $template) {
  if(preg_match("#^$route#", $uri)) {
      include($template);
  }
}

// if(defined("SITE_HOME")) {
//   $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//   $path = substr($url, strlen(SITE_HOME));

//   if($path == '/') {
//     require('content/layout/index.php');
//   } else {
//     $path = explode("/", $path);
//     foreach($routes as $route => $file) {
//       if(isset($path[1])) {
//         if($route == "/$path[1]") {
//           require($file);
//         }
//       } else {
//         require("content/layout/index.php");
//       }
//     }
//   }
// } else {
//   require('content/layout/404.php');
// }
