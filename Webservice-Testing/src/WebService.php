<?php


class WebService
{
    public function rotate($param)
    {
        return strrev($param);
    }

    public function length($param)
    {
        return strlen($param);
    }

    public function __call($methodName, $param)
    {
        echo 'method not found';
    }
}