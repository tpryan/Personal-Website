<?php
	// use google\appengine\api\app_identity\AppIdentityService;
	$app_name = "terrenceryan_com";
	
	$cache_path = sys_get_temp_dir();
	$GLOBALS["cache_path"] = sys_get_temp_dir();
	

	set_error_handler(
	    create_function(
	        '$severity, $message, $file, $line',
	        'throw new ErrorException($message, $severity, $severity, $file, $line);'
	    )
	);

	function shouldStillBeCached($file, $cache_age){
		$age = 0;
		$exists = file_exists($file);

		if ($exists){
			try {
				$age  = filemtime($file);
			} catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		if ($exists &&(time() - $age < $cache_age)){
			return true;
		}
		else{
			return false;
		}
	}
	
	function place_in_cache($location, $content) {
	    $parent = dirname($location);
	    if (!file_exists($parent) ){
	        mkdir($parent); 
        }
	    file_put_contents($location, $content);
	}
	
	function get_from_cache($location) {
		if (!file_exists($location)){
			return "";
		}

	    return file_get_contents($location);
    }

	function url_get_contents ($url) {
        $options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
        $context  = stream_context_create($options);	    
        $response = file_get_contents($url, false, $context);
	    return $response;
	}

	function get_content_from_service($url) {
		$content = url_get_contents($url);
		return json_decode($content, true);
	}

	function broadcast($message) {
		syslog(LOG_DEBUG, $message);
	    echo "<!--" . $message . " -->" . "\n";
	}

	function getFromCacheOrCreate($cache_name, $cache_age, $contentCreationFunction, $contentCreationStore, $count) {
		$cachefile = $GLOBALS["cache_path"] . "/" . $cache_name;
		$cached_content = get_from_cache($cachefile);
		$stillCached = shouldStillBeCached($cachefile, $cache_age);
		
		
		$rebuild = ($cached_content == false) || ($stillCached == false) || isset($_GET['reset_cache']);

		if ($rebuild){
			try {
				$content_html = $contentCreationFunction($contentCreationStore, $count);
				$cache_html = "<!-- From Cache -->" . $content_html;
				$cachefile = $GLOBALS["cache_path"] . "/" . $cache_name;
				place_in_cache($cachefile, $cache_html);
				
			} catch (Exception $e) {
				$content_html = "<p>No entries</p>";
			 	broadcast($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
			}
		} else {
			$content_html = $cached_content;
		}

		return $content_html;
	}

?>