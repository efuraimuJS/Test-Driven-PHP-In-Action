<?php

spl_autoload_register(function ($classname) {
    $filename = __DIR__ . "/../src/" . $classname . ".php";
    if (file_exists($filename)) {
        include_once($filename);
//        var_dump($filename);
    }
});

use PHPUnit\Framework\TestCase;

class DateFormatterTest extends TestCase
{
    public function testFormattingDatesBasedOnConfig()
    {
        $stub = $this->createPartialMock(Config::class, ['get']);
        $stub->expects(self::any())
            ->method('get')->with('date.format')
            ->will(self::returnValue('c'))
        ;

//        var_dump($stub);
        $formatter = new DateFormatter($stub);
//        var_dump($stub->get('params'));
//            var_dump($stub instanceof Config);
//            var_dump($formatter->getFormattedDate(0));die(); // "1970-01-01T00:00:00+00:00"

        self::assertEquals($formatter->getFormattedDate(0), "1970-01-01T00:00:00+00:00");

//        self::assertSame($stub, $stub->get());
//        self::assertNotSame($stub, $this->createPartialMock(Config::class, ['get']));
    }
}
