<?php
class MyURLTest extends PHPUnit_Framework_TestCase
{
    

    private $baseURL = "http://terrenceryan.dev";

    public function testMainURL() {
        $urlToTest = $this->baseURL;
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }


    public function testSVGURL() {
        $urlToTest = $this->baseURL . "/assets/img/flags/us.svg";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testJPGURL() {
        $urlToTest = $this->baseURL . "/assets/img/book.jpg";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testPNGURL() {
        $urlToTest = $this->baseURL . "/assets/img/bookfull.png";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testCSSURL() {
        $urlToTest = $this->baseURL . "/assets/css/main.css";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testJSURL() {
        $urlToTest = $this->baseURL . "/assets/js/contact.js";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testHTMLURL() {
        $urlToTest = $this->baseURL . "/googlee10b1d1d85d89d8d.html";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }




    public function testAboutURL() {
        $urlToTest = $this->baseURL . "/about/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testResumeURL() {
        $urlToTest = $this->baseURL . "/resume/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testBookURL() {
        $urlToTest = $this->baseURL . "/book/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testContactURL() {
        $urlToTest = $this->baseURL . "/contact/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }
    public function testThanksURL() {
        $urlToTest = $this->baseURL . "/thanks/";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

     public function testSlashAboutURL() {
        $urlToTest = $this->baseURL . "/about";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testSlashResumeURL() {
        $urlToTest = $this->baseURL . "/resume";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testSlashBookURL() {
        $urlToTest = $this->baseURL . "/book";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }

    public function testSlashContactURL() {
        $urlToTest = $this->baseURL . "/contact";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }
    public function testSlashThanksURL() {
        $urlToTest = $this->baseURL . "/thanks";
        $status = $this->getStatusCode($urlToTest);
        $this->assertTrue($status==200, $status . " " . $urlToTest);
    }





    public function getStatusCode($url){
        $headers = get_headers($url);
        $status_array = explode(" ", $headers[0]);
        return $status_array[1];
    }


}
;?>