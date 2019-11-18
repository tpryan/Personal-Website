<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/creds.php';
include_once 'module_common.php';


$count = 2;
$cache_name = $app_name . "_blog";
$cache_age = 2 * 60 * 60;
$dbInfo = $newDB;

// $contentCreationFunction = function ($dbInfo, $count){return refreshBlogHTML($dbInfo, $count);};
$contentCreationFunction = function ($blog_rss, $count){return refreshBlogHTML2($blog_rss, $count);};

$contentCreationStore = $blog_rss;

$content_html = getFromCacheOrCreate($cache_name, $cache_age, $contentCreationFunction, $contentCreationStore, $count);

echo $content_html;


function refreshBlogHTML2($blog_rss, $count){
	$blog_content = getPostsFromRSS($blog_rss, $count);
	$blog_html = generateBlogHTML($blog_content);
	return $blog_html;
}

function refreshBlogHTML($dbInfo, $count){
	$blog_content = getPostsFromDataBase($dbInfo, $count);
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

function getPostsFromDataBase($dbInfo, $count){
	// Make a MySQLi Connection
	if (isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
		$mysqli = mysqli_connect(null, $dbInfo['username'], $dbInfo['password'], $dbInfo['db'], null, "/cloudsql/" .$dbInfo['host']);
	} else{
		$mysqli = mysqli_connect($dbInfo['host'], $dbInfo['username'], $dbInfo['password'], $dbInfo['db']) or die(mysqli_error());
	}	
	

	// Retrieve all the data from the "example" table
	$entries = $mysqli->query(" SELECT
        p1.post_title, p1.post_excerpt, p1.post_name, p1.guid, p1.post_date, DATE_FORMAT(p1.post_date, '%M %d, %Y') as formatted_post_date, p2.guid as thumbnail
        
    FROM 
        wp_posts p1
    LEFT JOIN 
        wp_postmeta wm1
        ON (
            wm1.post_id = p1.id 
            AND wm1.meta_value IS NOT NULL 
            AND wm1.meta_key = '_thumbnail_id'             
        )
    LEFT JOIN 
        wp_postmeta wm2
        ON (
            wm1.meta_value = wm2.post_id
            AND wm2.meta_key = '_wp_attached_file'
            AND wm2.meta_value IS NOT NULL  
        )
	LEFT JOIN 
    	wp_posts p2 
    	ON (
    		 wm1.meta_value = p2.id
    	)
    WHERE
        p1.post_status='publish' 
        AND p1.post_type='post'
    ORDER BY 
        p1.post_date DESC
    LIMIT 0,". $count) or die(mysqli_error()); 

	return $entries;
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