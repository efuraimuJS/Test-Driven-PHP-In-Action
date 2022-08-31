<?php

spl_autoload_register(function ($classname) {
    $filename = __DIR__ . "/../src/" . $classname . ".php";
    if (file_exists($filename)) {
        include_once($filename);
        var_dump($filename);
    }
});


use PHPUnit\Framework\TestCase;

class FileLoggerTest extends TestCase
{
    const FILENAME = './log.txt';
    protected $logger;

    public function testCreatingLogfile()
    {
        $this->logger->writeToFile('Hello, World;');
        self::assertFileExists(self::FILENAME);
    }

    public function testCreatingFileOnFirstWrite()
    {
        self::assertFileDoesNotExist(self::FILENAME);
        $this->logger->writeToFile('Hello, World;');
        self::assertCount(1, file(self::FILENAME));
        self::assertFileExists(self::FILENAME);
    }

    public function testAppendingToFile()
    {
        $this->logger->writeToFile('Hello, World;');
        $this->logger->writeToFile('Hello, World;');
        $this->logger->writeToFile('Hello, World;');
        self::assertCount(3, file(self::FILENAME));
    }

    protected function setUp(): void
    {
        $this->logger = new FileLogger(self::FILENAME);

    }

    protected function tearDown(): void
    {
        if (file_exists(self::FILENAME)) {
            unlink(self::FILENAME);
        }
        $this->logger = null;
    }
}
