<?php


use PHPUnit\Framework\TestCase;

spl_autoload_register(function ($classname) {
    $filename = __DIR__ . "/../src/" . $classname . ".php";
    if (file_exists($filename)) {
        include_once($filename);
        var_dump($filename);
    }
});

class WebServiceTest extends TestCase
{
    static $ws;

    public static function setUpBeforeClass(): void
    {
        self::$ws = new WebService();

    }

    public function testRoute()
    {
//        self::assertEquals('otavne', $this->makeRequest('rotate', 'envato'));

        self::assertEquals('otavne', self::$ws->rotate('envato'));
    }

    public function testLength()
    {
//        self::assertEquals(6, $this->makeRequest('length', 'envato'));
        self::assertEquals(6, self::$ws->length('envato'));
    }

    public function testNotExitingMethod()
    {
//        self::assertEquals('method not found', $this->makeRequest('foo', 'envato'));
        self::assertEquals(null, self::$ws->foo('envato'));
    }

//    private function makeRequest(string $action, string $param)
//    {
//        $curl = curl_init();
//        $url = sprintf("http://0.0.0.0:9999/?action={$action}&param={$param}");
//        curl_setopt($curl, CURLOPT_URL, $url);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//        $data = curl_exec($curl);
//        curl_close($curl);
//        return $data;
//    }
}
