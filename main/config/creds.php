<?php



if (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "localhost") ){
	$newDB['username'] = "wordpress_user";
	$newDB['password'] = "sheetless_user";
	$newDB['db'] = "wordpress";
	$newDB['host'] = "terrenceryan_mysql";
	
} else{
	$newDB['username'] = "wordpress_user";
	$newDB['password'] = "ro&tw2dGfVy4KT";
	$newDB['db'] = "wordpress";
	$newDB['host'] = "173.194.245.177";
	
}

	// I hate myself.  But I gots to do what I gots to do. 
	$GLOBALS['maps_key'] = "AIzaSyCRCtTZz8Q3G-9z3fwJNyQSIm7E7_kT9qQ";
	$blog_rss = "http://tpryan.blog/feed/";



	$slideshare['api_key'] = "4FHcW847";
	$slideshare['secret'] = "lG5q1O6W";
    $akismet_key = "4fed0f2745eb";

    $googleprojectname = "arctic-marking-865.appspot.com";

	$twitter_settings = array(
	    'oauth_access_token' => "775187-wLUnDTkcZyj6vLbSFmFfOBVD6jHO5csxr2Q3ZWY7w",
	    'oauth_access_token_secret' => "ciqgt5xivxCJrBp8P5uEkAPXjjCvgtMMubLtLGsE2c",
	    'consumer_key' => "dgz1aU7S192YxVN5OdqFzw",
	    'consumer_secret' => "ZTLutowA3iTW1US7Wdl3jLvCsgoY0WMD9KUVvGOg"
	);

?>