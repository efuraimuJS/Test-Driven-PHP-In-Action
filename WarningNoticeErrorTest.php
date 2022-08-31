<?php


use PHPUnit\Framework\TestCase;

class WarningNoticeErrorTest extends TestCase
{
    /**
     * @expectedException \PHPUnit\Framework\Error
     */
    public function testForFatalErrors()
    {
        $this->expectException(\PHPUnit\Framework\Error::class);
        new SomeClassThatDoestExistInThisContext;
    }

    /**
     * @expectedException \PHPUnit\Framework\Error\Warning
     */
    public function testForWarnings()
    {
        $this->expectException(\PHPUnit\Framework\Error\Warning::class);

        include 'some.filenotpresent';
    }

    /**
     * @expectedException \PHPUnit\Framework\Error\Notice
     */
    public function testForNotice()
    {
        $this->expectException(\PHPUnit\Framework\Error\Notice::class);

        $_GET[THAT_CONSTANT_NOT_DEFINED];
    }
}
