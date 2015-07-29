<?php

namespace Weew\Curl;

class ResponseParser implements ICurlResponseParser {
    /**
     * @param $response
     *
     * @return array
     */
    public function getHeaders($response) {
        $lines = explode(PHP_EOL, $response);

        $headers = [];

        foreach ($lines as $line) {
            if (strpos($line, 'HTTP/') !== false) {
                continue;
            }

            if (strlen($line) == 0) {
                continue;
            }

            if (trim($line) == '') {
                break;
            }

            if (strpos($line, ':') === false) {
                continue;
            }

            list($key, $value) = explode(':', $line, 2);
            $headers[trim($key)] = trim($value);
        }

        return $headers;
    }

    /**
     * @param $response
     *
     * @return string
     */
    public function getContent($response) {
        $lines = explode(PHP_EOL, $response);

        foreach ($lines as $index => $line) {
            if (trim($line) == '') {
                return implode(PHP_EOL, array_slice($lines, $index + 1));
            }
        }

        return '';
    }
}
