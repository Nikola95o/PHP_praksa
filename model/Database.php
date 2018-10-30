<?php

require_once 'db_param.php';

class Database
{
    private static $instance = NULL;
    private function __construct(){}

    public static function connect()
    {
        if(self::$instance == NULL)
            $instance = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        return $instance;
    }
}