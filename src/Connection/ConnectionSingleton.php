<?php
namespace MicroForce\Connection;

class ConnectionSingleton
{
    static private $connection;
    
    static public function getConnection() : \PDO {
        if (!self::$connection) {
            throw new \LogicException('Trying to load unconfigured PDO connection instance');
        }
        return self::$connection;
    }
    
    static public function setConnection(\PDO $connection) : void
    {
        self::$connection = $connection;
    }
}