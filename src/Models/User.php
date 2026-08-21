<?php

class User
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function userRegister($email, $username, $password)
    {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO users(email,username,hash_password) VALUES (:email, :username, :hash_password)");

        $stmt->execute([
            'email' => $email,
            'username' => $username,
            'hash_password' => $hash_password
        ]);
    }
}
