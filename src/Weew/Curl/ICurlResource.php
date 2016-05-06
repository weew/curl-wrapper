<?php

namespace Weew\Curl;

interface ICurlResource {
    /**
     * @param $option
     *
     * @return mixed
     */
    function getOption($option);

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
     * @return mixed
     */
    function getErrorCode();

    /**
     * @return mixed
     */
    function getErrorMessage();

    /**
     * @return string
     */
    function exec();

    /**
     * Close curl resource.
     */
    function close();
}
