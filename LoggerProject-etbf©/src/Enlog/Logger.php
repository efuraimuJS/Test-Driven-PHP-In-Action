<?php


namespace Enlog;


use Enlog\Handler\HandlerInterface;
use stdClass;

class Logger
{
    protected array $registers = array();

    public function registerHandler(string $regHandler, HandlerInterface $register)
    {
        $this->registers[$regHandler] = $register;
    }

    public function getHandler(string $regHandler)
    {
        return $this->registers[$regHandler];
    }

    public function log(string $message)
    {
        $date = date('r');
        foreach ($this->registers as $register) {
            $register->write($date, $message);
        }
    }
}