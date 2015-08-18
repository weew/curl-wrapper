<?php

namespace Weew\Curl;

interface ICurlResource {
    /**
     * @param $option
     * @param $value
     */
    function setOption($option, $value);

    /**
     * @param $option
     *
     * @return mixed
     */
    function getInfo($option);

    /**
     * @return string
     */
    function exec();

    /**
     * Close curl resource.
     */
    function close();
}
