<?php

namespace Weew\Curl;

class CurlResource implements ICurlResource {
    /**
     * @var resource
     */
    protected $resource;

    /**
     * @var array
     */
    protected $options = [];

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
     *
     * @return mixed
     */
    public function getOption($option) {
        return array_get($this->options, $option);
    }

    /**
     * @param $option
     * @param $value
     */
    public function setOption($option, $value) {
        curl_setopt($this->resource, $option, $value);
        array_set($this->options, $option, $value);
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
     * @return mixed
     */
    public function getErrorCode() {
        return curl_errno($this->resource);
    }

    /**
     * @return mixed
     */
    public function getErrorMessage() {
        return curl_error($this->resource);
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
