<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/creds.php';
include_once 'module_common.php';


$count = 2;
$cache_name = $app_name . "_blog";
$cache_age = 2 * 60 * 60;

$contentCreationFunction = function ($blog_rss, $count){return refreshBlogHTML($blog_rss, $count);};

$contentCreationStore = $blog_rss;

$content_html = getFromCacheOrCreate($cache_name, $cache_age, $contentCreationFunction, $contentCreationStore, $count);

echo $content_html;


function refreshBlogHTML($blog_rss, $count){
	$blog_content = getPostsFromRSS($blog_rss, $count);
	$blog_html = generateBlogHTML($blog_content);
	return $blog_html;
}


function getPostsFromRSS($blog_rss, $count) {
	broadcast($blog_rss);
	$content = url_get_contents($blog_rss);
	$xml = simplexml_load_string($content);
	$json = json_encode($xml);
	$all_posts = json_decode($json,TRUE);
	$posts = [];

	for ($i=0; $i < $count; $i++){
		$posts[$i]=$all_posts['channel']['item'][$i];
	}	
	return $posts;
}


function generateBlogHTML($entries){

	$results = "";
	$results .=  "<!-- pulled in from blog -->" ."\n";
	
	for ($i=0; $i < count($entries); $i++){

		$row = $entries[$i];
		$title = $row['title'];
		$post_date = $row['pubDate'];
		$excerpt = $row['description'];
		$excerpt = "";
		$url = $row['link'];
		$thumb = "";
		$date = strtotime($row['pubDate']);
		$item = "";
		$item .= '			<article>'. "\n";
		$item .= '				<h1><a href="' . $url . '">' . $title .'</a></h1>'. "\n";
		$item .= '				<time datetime="' . $post_date . '">' . $date . '</time>'. "\n";
		
		if (strlen($thumb) > 0){
			$item .= '				<img src="' . $thumb . '" />'. "\n";
		}
		$item .= '				<div><p>' . strip_tags($excerpt) . '</p></div>'. "\n";

		$item .= '			</article>'. "\n";	
		$results .= $item; 
	}
	return $results;
}




?>