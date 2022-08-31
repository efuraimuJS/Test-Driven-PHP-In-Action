<?php

namespace Enlog;

use Enlog\Handler\HandlerInterface;
use PHPUnit\Framework\TestCase;
use stdClass;

class LoggerTest extends TestCase
{
    /**
     * @var $logger Logger
     */
    protected $logger;

    protected function setUp(): void
    {
        $this->logger = new Logger();
    }

    public function testInstance()
    {
        self::assertInstanceOf('\Enlog\Logger', $this->logger);
    }

    public function testRegisterHandlerCorrectly()
    {
        $handler = $this->getHandlerMock();
        $this->logger->registerHandler('memory', $handler);

        $this->logger->getHandler('memory');
        self::assertSame($handler, $this->logger->getHandler('memory'));
    }

    public function testPassingCallsToHandlers()
    {
        $mock = $this->getHandlerMock();
        $mock->expects(self::once())->method('write');

        $this->logger->registerHandler('memory', $mock);
        $this->logger->log('Hello, world!');
    }

    public function getHandlerMock()
    {
        return $this->createMock(HandlerInterface::class);
    }

}
