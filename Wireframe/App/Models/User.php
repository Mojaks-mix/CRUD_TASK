<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function __construct()
    {
        $this->table = 'users';
        parent::__construct();
    }

    public function getUser($userKey)
    {
        $query = "SELECT id, username FROM $this->table WHERE  email=? OR username=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$userKey, $userKey]);

        return $stmt->fetch();
    }

    public function getUserCredentials($data)
    {
        $query = "SELECT password FROM $this->table WHERE  id=:id AND username=:username";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        return $stmt->fetch()['password'];
    }

}