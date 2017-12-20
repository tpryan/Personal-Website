<?php
function redirect($url, $statusCode = 302){
    header('Location: ' . $url, true, $statusCode);
    die();
}
$hostname = "blog.terrenceryan.com";
$new_path = str_replace("/blog/","",$_SERVER['PATH_INFO']);
$destination = "http://" . $hostname ."/" . $new_path;
redirect($destination, 301);