<?php
spl_autoload_register(function ($classname) {
    $filename = $classname . ".php";

    if (file_exists($filename)) {
        include_once($filename);
    }
});

class DateFormatter
{
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getFormattedDate($timestamp)
    {
        return date($this->config->get('date.format'), $timestamp);
    }
}