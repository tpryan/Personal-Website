<?php 

function redirect($url, $statusCode = 303)
{
	header('Location: ' . $url, true, $statusCode);
	echo "<script>location.href='" . $url ."';</script>";
   	exit();
}

function blogcatch(){
	$path = $_GET["orig"];

	$blogpart =  isBlog();
	if (strlen($blogpart) > 0){
		$point = str_replace($blogpart, "", $path);
		$target = "https://tpryan.blog" . $point;
		redirect($target, 301);
	}
}

function isBlog(){
	$blog_strings = [];
	array_push($blog_strings, "/post.cfm");
	array_push($blog_strings, "/blog/index.php");
	

	
	for ($i=0; $i<count($blog_strings); $i++){

		if (strpos($_SERVER["REQUEST_URI"], $blog_strings[$i]) > -1){
			return $blog_strings[$i];
		}	
	}
	
	return "";

}


?>