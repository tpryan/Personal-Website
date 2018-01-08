<?php
function redirect($url, $statusCode = 302){
    header('Location: ' . $url, true, $statusCode);
    die();
}
$hostname = "blog.terrenceryan.com";
$new_path = str_replace("/blog/","",$_SERVER['REQUEST_URI']);
$destination = "https://" . $hostname ."/" . $new_path;
redirect($destination, 301);