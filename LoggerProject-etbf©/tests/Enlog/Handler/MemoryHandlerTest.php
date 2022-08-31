<?php

namespace Enlog\Handler;

use Enlog\Handler\MemoryHandler;
use PHPUnit\Framework\TestCase;

class MemoryHandlerTest extends TestCase
{
    /**
     * @var $handler MemoryHandler\
     */
    protected $handler;

    public function testImplementationHandlerInterface()
    {
        self::assertInstanceOf('Enlog\Handler\HandlerInterface', $this->handler);
    }

    protected function setUp(): void
    {
        $this->handler = new MemoryHandler();

    }

    public function testWritetoInternal()
    {
        $this->handler->write(6666, 'Hello, world!');
        self::assertIsArray($this->handler->getEntries());
        self::assertCount(1, $this->handler->getEntries());
        self::assertEquals(['6666 Hello, world!'], $this->handler->getEntries());

        $this->handler->write(66667, 'Hello, world!!');
        self::assertIsArray($this->handler->getEntries());
        self::assertCount(2, $this->handler->getEntries());
        self::assertEquals(['6666 Hello, world!', '66667 Hello, world!!'], $this->handler->getEntries());
    }


}
