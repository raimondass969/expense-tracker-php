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

        try {
            $stmt = $this->pdo->prepare("INSERT INTO users(email,username,hash_password) VALUES (:email, :username, :hash_password)");

            $stmt->execute([
                'email' => $email,
                'username' => $username,
                'hash_password' => $hash_password
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function userLogin($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([
            'email' => $email,
        ]);
        // get connected user
        $user = $stmt->fetch();
        if (!$user) {
            return false;
        }

        $confirmedPassword = password_verify($password, $user['hash_password']);
        if (!$confirmedPassword) {
            return false;
        }
        return $user;
    }

    public function isEmailTaken($email)
    {
        $stmt = $this->pdo->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->execute([
            'email' => $email,
        ]);
        $enteredEmail = $stmt->fetch();
        if ($enteredEmail) {
            return true;
        }
        return false;
    }
}
