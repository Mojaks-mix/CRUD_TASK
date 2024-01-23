<?php
namespace App\Core;

use PDO;

class Database
{

    private PDO $_connection;
    // Store the single instance.
    private static $_instance;
    
    // Get an instance of the Database.
    // @return Database:
    protected static function getInstance(array $config): Database
    {
        if (!self::$_instance) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }

    public static function pdo(array $config): PDO
    {
        $db = static::getInstance($config);
        return $db->getConnection();
    }

    // Constructor - Build the PDO Connection:
    private function __construct(array $config)
    {
        $default_options = array(
            /* important! use actual prepared statements (default: emulate prepared statements) */
            PDO::ATTR_EMULATE_PREPARES => false
            /* throw exceptions on errors (default: stay silent) */
            , PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            /* fetch associative arrays (default: mixed arrays)    */
            , PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try {
        $this->_connection = new PDO(
                $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
                $config['user'],
                $config['pass'],
                $config['options']?? $default_options
        );
        }catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    // Empty clone magic method to prevent duplication:
    private function __clone(){}

    // Get the PDO connection:
    protected function getConnection(): PDO
    {
        return $this->_connection;
    }

}
