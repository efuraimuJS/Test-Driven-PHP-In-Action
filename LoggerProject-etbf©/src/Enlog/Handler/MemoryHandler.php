<?php


namespace Enlog\Handler;


class MemoryHandler implements HandlerInterface
{
    protected $entries = array();
    protected $timestamp;
    protected $message;

    /**
     * MemoryHandler constructor.
     */
    public function __construct()
    {
    }

    public function write($timestamp, $message)

    {
        $this->timestamp = $timestamp;
        $this->message = $message;
        $perEntry = $timestamp . ' ' . $message;
        $this->entries[] = $perEntry;
    }

    public function getEntries()
    {
        return $this->entries;
    }
}