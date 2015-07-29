<?php

namespace Weew\Curl;

interface ICurlResponseParser {
    /**
     * @param $response
     *
     * @return array
     */
    function getHeaders($response);

    /**
     * @param $response
     *
     * @return string
     */
    function getContent($response);
}
