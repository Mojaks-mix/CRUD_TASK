<?php

namespace App\Models;

use App\Core\Model;

class Home extends Model
{
    public function __construct()
    {
        $this->table = ['categories', 'contents'];
        parent::__construct();
    }

    public function getContentsCount()
    {
        $table = $this->table[1];
        $query = "SELECT COUNT(*) AS contents_count FROM $table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch()['contents_count'];
    }

    public function getCategoriesCount()
    {
        $table = $this->table[0];
        $query = "SELECT COUNT(*) AS categories_count FROM $table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch()['categories_count'];
    }

    public function getPieData()
    {
        $table = $this->table[0]; 
        $table2 = $this->table[1]; 
        $query = "SELECT c1.id, c1.category_name,
                    (SELECT COUNT(*) FROM $table2 WHERE category_id=c1.id) AS content_count 
                    FROM $table c1
                    WHERE (SELECT COUNT(*) FROM $table2 WHERE category_id=c1.id)>0";
        return $this->conn->query($query)->fetchAll();
    }
}