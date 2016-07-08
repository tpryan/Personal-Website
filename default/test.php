<?php

	echo "<pre>";
	var_dump($_SERVER);

	echo "</pre>";




if (isset($_SERVER['SERVER_ADDR']) && strpos($_SERVER['SERVER_ADDR'],'.dev') != false) {
	echo "<pre>";
	echo "dev";

	echo "</pre>";
} else{
	echo "<pre>";
	echo "prod";

	echo "</pre>";
	
}

echo "answer: " . strpos($_SERVER['SERVER_ADDR'],'.dev');

?>