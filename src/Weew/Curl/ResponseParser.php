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
            $line = trim($line);

            if ($line == '') {
                break;
            }

            if (strpos($line, 'HTTP/') !== false or
                strpos($line, ':') === false
            ) {
                continue;
            }

            list($key, $value) = explode(':', $line, 2);
            $key = trim($key);
            $value = trim($value);
            $values = array_get($headers, $key, []);

            $values[] = $value;
            $headers[$key] = $values;
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
