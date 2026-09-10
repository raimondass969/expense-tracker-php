<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Exceptions\RegisterNewUserException;
use App\Exceptions\NewCategoryException;
use PDO;
use Throwable;

class RegisterController
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function register(string $email, string $username, string $password): bool
    {

        $user = new User($this->pdo);
        try {
            $this->pdo->beginTransaction();
            $newUserId = $user->userRegister($email, $username, $password);

            if (!$newUserId) {
                throw new RegisterNewUserException('Registracija nesėkminga');
            }

            $defaultCategories = [
                'Food',
                'Transport',
                'Other'
            ];

            $newCategory = new Category($this->pdo);
            // Create default categories for new users
            foreach ($defaultCategories as $category) {
                $createdCategory = $newCategory->addCategory($newUserId, $category);

                if (!$createdCategory) {
                    throw new NewCategoryException('Nepavyko sukurti kategorijos');
                }
            }
            $this->pdo->commit();
            return true;
        } catch (Throwable $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }

            return false;
        }
    }
}
