<?php

namespace App\Models;

use App\Core\Model;
use App\DataObjects\CategoryDTO;

class Category extends Model
{
    public function __construct()
    {
        $this->table = 'categories';
        parent::__construct();
    }

    public function getAllCategories()
    {
        $query = "SELECT * FROM $this->table";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        $rows = $statement->fetchAll();

        $categories = [];
        if($rows !== null){
            foreach($rows as $row){
                $category = new CategoryDTO($row['id'],
                $row['category_name'],
                $row['parent_id']
                );
                $categories[] = $category;
            }
        }

        return $categories;
    }

    public function addCategory(array $data)
    {
        $sql = "INSERT INTO $this->table (category_name, parent_id) VALUES (:category_name, :parent_id)";

        return $this->conn->prepare($sql)->execute($data);
    }

    public function deleteCategory($id)
    {
        return $this->conn->prepare("DELETE FROM $this->table WHERE id=?")->execute([$id]);
    }

    public function getCategory($id)
    {
        $stmt = $this->conn->prepare("SELECT id, category_name, parent_id FROM $this->table WHERE id=? LIMIT 1"); 
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateCategory($id, $data)
    {
        $sql = "UPDATE $this->table SET category_name=:category_name, parent_id=:parent_id WHERE id=$id";

        return $this->conn->prepare($sql)->execute($data);
    }
}
