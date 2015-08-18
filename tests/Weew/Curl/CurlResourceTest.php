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
}
