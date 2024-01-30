<?php

namespace App\Models;

use App\Core\Model;

class Content extends Model
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
        $this->table = 'contents';
        parent::__construct();
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getPaginatedContents($perPage = 0, $offset = 0, string $searchValue = null, $count = 0)
    {
        if (!empty($searchValue)) {
            $searchValue = "%" . $searchValue . "%";

            if ($count == 1) {
                $query = "SELECT COUNT(*) AS count
                            FROM contents c
                            JOIN categories cat ON c.category_id = cat.id
                            WHERE c.enabled = 1 AND cat.category_name LIKE :searchValue";

                $stmt = $this->conn->prepare($query);

                $stmt->bindParam(':searchValue', $searchValue);

                $stmt->execute();
                $result = $stmt->fetch();

                $count = $result['count'];

                return $count;
            }

            $query = "SELECT c.id, c.content_title, c.category_id, cat.category_name, c.added_date, c.added_by
                        FROM contents c
                        JOIN categories cat ON c.category_id = cat.id
                        WHERE c.enabled = 1 AND cat.category_name LIKE :searchValue";

            $stmt = $this->conn->prepare($query);
            $stmt->execute([$searchValue]);

            return $stmt->fetchAll();
        } else {
            if ($count == 1) {
                $query = "SELECT COUNT(*) AS count FROM contents WHERE enabled = 1";

                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetch();

                $count = $result['count'];

                return $count;
            }

            $query = "SELECT c.id, c.content_title, c.category_id, cat.category_name, c.added_date, c.added_by
                        FROM contents c
                        JOIN categories cat ON c.category_id = cat.id
                        WHERE c.enabled = 1
                        LIMIT $perPage OFFSET $offset";
            return $this->conn->query($query)->fetchAll();
        }
    }

    public function addContent(array $data) //it will change when we have a user to get his id from the session
    {
        $sql = "INSERT INTO $this->table (content_title, content, category_id, enabled, added_by, added_date)
                VALUES (:content_title, :content, :category_id, :enabled, :added_by, :added_date)";

        return $this->conn->prepare($sql)->execute($data);
    }

    public function deleteContent($id)
    {
        return $this->conn->prepare("DELETE FROM $this->table WHERE id=?")->execute([$id]);
    }

    public function getContent($id)
    {
        $stmt = $this->conn->prepare("SELECT id, content_title, category_id, content, content FROM $this->table WHERE id=:id AND enabled = 1 LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateContent($id, $data) //it will change when we have a user to get his id from the session
    {
        $sql = "UPDATE $this->table SET content_title=:content_title, content=:content, category_id=:category_id, enabled=:enabled, added_by=:added_by, added_date=:added_date WHERE id=$id";

        return $this->conn->prepare($sql)->execute($data);
    }

    public function getAllContentsCount()
    {
        $query = "SELECT COUNT(*) AS contents_count FROM $this->table WHERE enabled = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $contents_count = $stmt->fetch()['contents_count'];
        return $contents_count;
    }
}
