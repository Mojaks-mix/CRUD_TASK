<?php
declare (strict_types = 1);

namespace App\Core;

use PDO;
//Abstract Model

abstract class Model
{
    protected PDO $conn;
    protected $table = '';
    
    public function __construct()
    {
        $this->conn = Database::pdo();
    }
}