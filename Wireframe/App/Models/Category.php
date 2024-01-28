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

    public function getPaginatedCategories($perPage = 0, $offset = 0, string $searchValue = null, $count = 0)
    {
        if(! empty($searchValue)){
            $searchValue = "%" . $searchValue . "%";

            if($count == 1){
                $query = "SELECT COUNT(*) as count
                            FROM $this->table c1
                            LEFT JOIN categories c2 ON c1.parent_id = c2.id
                            WHERE c1.category_name LIKE :searchValue";

                $stmt = $this->conn->prepare($query);

                $stmt->bindParam(':searchValue', $searchValue);

                $stmt->execute();
                $result = $stmt->fetch();

                $count = $result['count'];

                return $count;
            }

            $query = "SELECT c1.id, c1.category_name, c2.category_name AS parent_category_name,
                        (SELECT COUNT(*) FROM contents WHERE category_id = c1.id) AS content_count
                        FROM $this->table c1
                        LEFT JOIN categories c2 ON c1.parent_id = c2.id
                        WHERE c1.category_name LIKE :searchValue
                        LIMIT $perPage OFFSET $offset";

            $stmt = $this->conn->prepare($query);
            $stmt->execute([$searchValue]);

            return $stmt->fetchAll();
        }
        else
        {
            if($count == 1){
                $query = "SELECT COUNT(*) as count
                            FROM $this->table c1
                            LEFT JOIN categories c2 ON c1.parent_id = c2.id";

                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetch();

                $count = $result['count'];

                return $count;
            }

            $query = "SELECT c1.id, c1.category_name, c2.category_name AS parent_category_name,
                    (SELECT COUNT(*) FROM contents WHERE category_id = c1.id) AS content_count
                    FROM $this->table c1
                    LEFT JOIN categories c2 ON c1.parent_id = c2.id
                    LIMIT $perPage OFFSET $offset";
            return $this->conn->query($query)->fetchAll();
        }
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
        $this->conn->prepare("UPDATE $this->table SET parent_id = NULL WHERE parent_id =?")->execute([$id]);   
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

    public function getAllCategoriesCount()
    {
        $query = "SELECT COUNT(*) AS category_count FROM $this->table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $category_count = $stmt->fetch()['category_count'];
        return $category_count;
    }
}
