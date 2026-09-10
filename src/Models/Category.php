<?php

namespace App\Models;

use PDO;
use PDOException;

class Category
{

    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addCategory($userId, $name)
    {

        try {
            $stmt = $this->pdo->prepare("INSERT INTO categories (user_id,NAME) values (:user_id, :NAME) ");
            $stmt->execute([
                'user_id' => $userId,
                'NAME' => $name,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getCategoriesForUser($userId)
    {

        try {
            $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE user_id = :user_id");
            $stmt->execute([
                'user_id' => $userId,
            ]);
            return  $stmt->fetchAll();
        } catch (PDOException $e) {
            return false;
        }
    }
}
