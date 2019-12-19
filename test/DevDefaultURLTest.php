<?php

use PHPUnit\Framework\TestCase;

class MyURLTest extends TestCase
{

    public function getBaseURL() {
        return "http://127.0.0.1:8080";
    }

    public function testMainURL() {
        $urlToTest = $this->getBaseURL();
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testSVGURL() {
        $urlToTest = $this->getBaseURL() . "/assets/img/flags/us.svg";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testJPGURL() {
        $urlToTest = $this->getBaseURL() . "/assets/img/book.jpg";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testPNGURL() {
        $urlToTest = $this->getBaseURL() . "/assets/img/bookfull.png";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testCSSURL() {
        $urlToTest = $this->getBaseURL() . "/assets/css/main.css";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testJSURL() {
        $urlToTest = $this->getBaseURL() . "/assets/js/contact.js";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testHTMLURL() {
        $urlToTest = $this->getBaseURL() . "/googlee10b1d1d85d89d8d.html";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testAboutURL() {
        $urlToTest = $this->getBaseURL() . "/about/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testResumeURL() {
        $urlToTest = $this->getBaseURL() . "/resume/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testBookURL() {
        $urlToTest = $this->getBaseURL() . "/book/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testContactURL() {
        $urlToTest = $this->getBaseURL() . "/contact/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }
    public function testThanksURL() {
        $urlToTest = $this->getBaseURL() . "/thanks/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, "want 200 got " . $status . " from " . $urlToTest);
    }

     public function testNoSlashAboutURL() {
        $urlToTest = $this->getBaseURL() . "/about";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testNoSlashResumeURL() {
        $urlToTest = $this->getBaseURL() . "/resume";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testNoSlashBookURL() {
        $urlToTest = $this->getBaseURL() . "/book";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function testNoSlashContactURL() {
        $urlToTest = $this->getBaseURL() . "/contact";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 200 got " . $status . " from " . $urlToTest);
    }
    public function testNoSlashThanksURL() {
        $urlToTest = $this->getBaseURL() . "/thanks";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==301, "want 200 got " . $status . " from " . $urlToTest);
    }

    public function getStatusCode($url){
        $headers = get_headers($url);
        $status_array = explode(" ", $headers[0]);
        return $status_array[1];
    }

}
;?>