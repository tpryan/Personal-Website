<?php

use PHPUnit\Framework\TestCase;

class MyURLTest extends TestCase
{
    

    public function getBaseURL() {
        return "http://127.0.0.1:8080";
    }


    public function testBlogURL() {
        $urlToTest = $this->getBaseURL() . "/blog/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 301 got " . $status . " from " . $urlToTest);
    }

    public function testBlogPostURL() {
        $urlToTest = $this->getBaseURL() . "/blog/index.php/little-update-to-brackets-reflow-cleaner-2/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 301 got " . $status . " from " . $urlToTest);
    }

    public function testBlogTagURL() {
        $urlToTest = $this->getBaseURL() . "/blog/index.php/tag/ant/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 301 got " . $status . " from " . $urlToTest);
    }

    public function testBlogArchiveURL() {
        $urlToTest = $this->getBaseURL() . "/blog/index.php/2014/01/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 301 got " . $status . " from " . $urlToTest);
    }

    public function testBlogRedirectURL() {
        $urlToTest = $this->getBaseURL() . "/blog";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 301 got " . $status . " from " . $urlToTest);
    }





    public function getStatusCode($url){
        $headers = get_headers($url);
        $status_array = explode(" ", $headers[0]);
        return $status_array[1];
    }


}
;?>