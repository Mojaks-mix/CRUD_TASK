<?php

namespace App\Models;

use App\Core\Database;

class Product extends Database
{
    private $table = 'products';
    private $conn;

    public function __construct()
    {
        $this->conn = $this->pdo();
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM $this->table";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        $rows = $statement->fetchAll();

        return $rows;
    }

    public function addProduct(array $data)
    {
        $sql = "INSERT INTO $this->table (name, price, description, quantity) VALUES (:name, :price, :description, :quantity)";

        return $this->conn->prepare($sql)->execute($data);
    }

    public function deleteProduct($id)
    {
        return $this->conn->prepare("DELETE FROM $this->table WHERE id=?")->execute([$id]);
    }

    public function getProduct($id)
    {
        $stmt = $this->conn->prepare("SELECT id, name, price, description, quantity FROM $this->table WHERE id=? LIMIT 1"); 
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateProduct($id, $data)
    {
        $sql = "UPDATE $this->table SET name=:name, price=:price, description=:description, quantity=:quantity WHERE id=$id";

        return $this->conn->prepare($sql)->execute($data);
    }
}
