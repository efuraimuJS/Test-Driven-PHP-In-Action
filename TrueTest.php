<?php
spl_autoload_register(function ($classname) {
    $filename = $classname . ".php";

    if (file_exists($filename)) {
        include_once($filename);
    }
});

use PHPUnit\Framework\TestCase;

class TrueTest extends TestCase
{
    public function testForTrueValue()
    {
//        self::assertTrue(false, 'Our value should true');
        self::assertTrue(new DateTime() instanceof DateTime);

    }

    public function testForEquality()
    {
        self::assertEquals(7, 8, 'Our value should equal');
    }

    public function testForClassInstance()
    {
        self::assertInstanceOf('DateTime', new DateTime());
        self::assertNotInstanceOf('DateTimeZone', new DateTime());
    }

    public function testForObjectCounts()
    {
        $arr = array_fill(0, 2, 3.0);
        self::assertCount(2, $arr);
        print_r($arr);
        array_pop($arr);
        self::assertCount(1, $arr);

    }

    public function testForOjectPresentinCollection()
    {
        $arr = array_fill(0, 2, 3.0);
        self::assertContains(3.0, $arr);
    }

}
