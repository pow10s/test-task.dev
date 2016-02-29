<?php
namespace libs;

class DBConnector
{
    protected static $db;

    private function __construct()
    {
        try {
            self::$db = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }

    public static function getConnection()
    {
        if (!self::$db) {
            new DBConnector();
        }

        return self::$db;
    }
}
