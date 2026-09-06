<?php
session_start();

$pdo = require_once '../../config/database.php';
require_once '../../src/Models/User.php';
require_once '../../src/Services/Csrf.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['register_email'];
    $username = $_POST['register_username'];
    $password = $_POST['register_password'];
    $confirm_password = $_POST['confirm_register_password'];

    $token = $_POST['csrf_token'];
    if (!Csrf::validateToken($token)) {
        exit('Invalid csrf token');
    }

    $user = new User($pdo);



    if (!$email || !$username || !$password || !$confirm_password) {
        echo 'Visi laukai privalomi';
        return false;
    }

    if ($user->isEmailTaken($email)) {
        echo 'El pastas jau egzsistuoja';
        return false;
    }

    if ($password !== $confirm_password) {
        echo 'Slaptazodziai nesutampa';
        return false;
    }

    if (strlen($password) < 8) {
        echo 'Slaptazodis turi tureti maziausiai 8 simbolius';
        return false;
    }

    $newUser = $user->userRegister($email, $username, $password);

    if ($newUser) {
        header('Location: /auth/login-form.php');
        exit();
    } else {
        echo 'Registracija nesekmniga!';
        exit();
    }
}
