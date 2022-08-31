<?php


use PHPUnit\Framework\TestCase;

class SQLiteDatabaseTest extends TestCase
{
    static $db;

    public static function setUpBeforeClass(): void
    {
        self::$db = new PDO('sqlite::memory');
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db->exec('create table results4 (id integer, user_id integer, game_id integer, scores integer)');

        self::$db->query('insert into results4 values(1, 1,2, 55)');
        self::$db->query('insert into results4 values(2, 1,2, 66)');
        self::$db->query('insert into results4 values(3, 2,1, 77)');
    }

    public static function tearDownAfterClass(): void
    {
        self::$db->exec('drop table results4');
    }

    public function testSummerizedResults()
    {
        $result = self::$db->query('select sum(scores) as sum from results4 where user_id = 2')->fetchObject();
        self::assertEquals(77, $result->sum);
    }

    public function testSingleResult()
    {
        $result = self::$db->query('select * from results4 where id = 2')->fetchObject();
        $expected = (object)array(
            'id' => 2,
            'game_id' => 2,
            'user_id' => 1,
            'scores' => 66
        );
        $this->assertEquals($expected, $result);
    }
}
