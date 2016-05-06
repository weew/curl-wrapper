<?php

namespace Tests\Weew\Curl;

use PHPUnit_Framework_TestCase;
use Weew\Curl\CurlResource;

class CurlResourceTest extends PHPUnit_Framework_TestCase {
    public function test_dry_run() {
        $resource = new CurlResource();
        $resource->setOption(CURLOPT_RETURNTRANSFER, false);
        $resource->getInfo(CURLOPT_RETURNTRANSFER);
        $resource->exec();
        $resource->close();
    }

    public function test_get_and_set_option() {
        $resource = new CurlResource();
        $this->assertNull($resource->getOption(CURLOPT_CUSTOMREQUEST));
        $resource->setOption(CURLOPT_CUSTOMREQUEST, 'POST');
        $this->assertEquals('POST', $resource->getOption(CURLOPT_CUSTOMREQUEST));
    }

    public function test_get_error_code() {
        $resource = new CurlResource();
        $this->assertEquals(0, $resource->getErrorCode());
    }

    public function test_get_error_message() {
        $resource = new CurlResource();
        $this->assertEquals('', $resource->getErrorMessage());
    }
}
