<?php


use PHPUnit\Framework\TestCase;

class AssertionsTest extends TestCase
{
    public function testForLogicException()
    {
        try {
            throw new LogicException('Foo', 123);
        } catch (LogicException $e) {
            self::assertEquals($e->getMessage(), 'Foo');
            self::assertEquals($e->getCode(), 123);

        }
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Foo
     * @expectedExceptionCode 123
     */
    public function testForAnnotatedExceptions()
    {
        $this->expectException(LogicException::class);

        throw new LogicException('Foo', 123);

    }
}
