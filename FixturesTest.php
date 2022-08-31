<?php


use PHPUnit\Framework\TestCase;

class FixturesTest extends TestCase
{
    protected $test_data;

    public function testPushingToArray()
    {
        array_push($this->test_data, 6);
        self::assertContains(6, $this->test_data);
    }

    public function testPopFromArray()
    {
        array_push($this->test_data);
        self::assertNotContains(6, $this->test_data);
    }

    public function testShiftFromArray()
    {
        array_shift($this->test_data);
        self::assertNotContains(1, $this->test_data);
    }

    protected function setUp(): void
    {
        print_r('test_data init' . "\n");
        $this->test_data = array(1, 2, 3, 4, 5);
    }

    protected function tearDown(): void
    {
        print_r('test_data clean-up' . "\n");
    }

    public static function setUpBeforeClass(): void
    {
        print_r('database initialized...' . "\n");
    }

    public static function tearDownAfterClass(): void
    {
        print_r('database disconnected sucessfully...' . "\n");
    }
}
