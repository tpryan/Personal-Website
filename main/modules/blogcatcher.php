<?php 


function redirect($url, $statusCode = 303)
{
	header('Location: ' . $url, true, $statusCode);
	echo "<script>location.href='" . $url ."';</script>";
   	exit();
}

function blogcatch(){
	if (strpos($_SERVER["REQUEST_URI"], "post.cfm") > -1){
		$point = end(explode("/",$_SERVER["REQUEST_URI"]));
		$base_url = "https://tpryan.blog";

		$target = $base_url . "/" . $point;
		
		redirect($target, 301);
	}
}


?>