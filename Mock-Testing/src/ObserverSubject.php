<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Observer
{
    public function update($args)
    {
        return 'updated';
    }

    public function reportError($errorCode, $errorMessage, Subject $subject)
    {
        return 'err: 42 - Something went wrong on, HttpClient::class';
    }
}

class Subject
{
    protected $observers = [];
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function attach(Observer $observer)
    {
        $this->observers = $observer;
    }


    public function stimuli()
    {
        $this->notify('reaction: 01');
    }

    public function antiStimuli()
    {
        foreach ($this->observers as $observer) {
            $observer->reportError(42, 'Something went wrong', $this);
        }
    }

    public function notify($args)
    {
        foreach ($this->observers as $observer) {
            $observer->update(args);
        }
    }

}


