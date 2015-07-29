<?php

namespace Tests\Weew\Curl;

use PHPUnit_Framework_TestCase;
use Weew\Curl\ResponseParser;

class CurlResponseParserTest extends PHPUnit_Framework_TestCase {
    private function getRawResponse() {
        return file_get_contents(__DIR__.'/response');
    }

    private function getHeaders() {
        return [
            'Connection' => 'close',
            'Content-Type' => 'text/xml',
            'Content-Length' => 289,
            'Set-Cookie' => ['foo=bar;', 'bar=foo;'],
        ];
    }

    public function test_parse_headers() {
        $parser = new ResponseParser(null, null);
        $headers = $parser->getHeaders($this->getRawResponse());
        $this->assertEquals($this->getHeaders(), $headers);
    }

    public function test_parse_content() {
        $parser = new ResponseParser(null, null);
        $response = $this->getRawResponse();
        $content = $parser->getContent($response);

        $this->assertEquals('foo'.PHP_EOL, $content);

        $response = str_replace('foo'.PHP_EOL, '', $response);
        $content = $parser->getContent($response);
        $this->assertEquals('', $content);

        $response = str_replace(PHP_EOL.PHP_EOL, '', $response);
        $content = $parser->getContent($response);
        $this->assertEquals('', $content);
    }
}
