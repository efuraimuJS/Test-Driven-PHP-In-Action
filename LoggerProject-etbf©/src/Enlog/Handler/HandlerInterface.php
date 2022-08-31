<?php


namespace Enlog\Handler;


interface HandlerInterface
{
    public function write($timestamp, $message);

}