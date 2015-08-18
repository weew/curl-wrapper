<?php

namespace Weew\Curl;

class CurlResource implements ICurlResource {
    /**
     * @var resource
     */
    protected $resource;

    /**
     * @param null $resource
     */
    public function __construct($resource = null) {
        if ($resource === null) {
            $resource = curl_init();
        }

        $this->resource = $resource;
    }

    /**
     * @param $option
     * @param $value
     */
    public function setOption($option, $value) {
        curl_setopt($this->resource, $option, $value);
    }

    /**
     * @param $option
     *
     * @return mixed
     */
    public function getInfo($option) {
        return curl_getinfo($this->resource, $option);
    }

    /**
     * @return string
     */
    public function exec() {
        return curl_exec($this->resource);
    }

    /**
     * Close curl resource.
     */
    public function close() {
        curl_close($this->resource);
    }
}
