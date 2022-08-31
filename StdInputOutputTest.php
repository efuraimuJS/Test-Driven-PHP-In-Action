<?php


use PHPUnit\Framework\TestCase;

class Command
{
    const VERSION = '9.1.0';

    public function printVersion()
    {
        print 'Version is ' . self::VERSION;
    }
}

class StdInputOutputTest extends TestCase
{
    public function testForCMDOutput()
    {
        $this->expectOutputRegex('/Version is/');
        $cmd = new Command();
        print $cmd->printVersion();

        $this->expectOutputString('Version is 9.1.0');
        $cmd1 = new Command();
        $cmd1->printVersion();

        ob_start();
        $cmd2 = new Command();
        $cmd2->printVersion();
        $txt = ob_get_clean();

        self::assertEquals('Version is 9.1.0', $txt);

    }
}
