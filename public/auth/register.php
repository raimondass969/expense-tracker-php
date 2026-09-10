<?php

use App\Models\User;
use App\Services\Csrf;
use App\Controllers\RegisterController;

$pdo = require_once __DIR__ . '/../../bootstrap.php';

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
        exit();
    }

    if (strlen($password) < 8) {
        echo 'Slaptazodis turi tureti maziausiai 8 simbolius';
        exit();
    }

    $registerController = new RegisterController($pdo);
    $registered = $registerController->register($email, $username, $password);
    if (!$registered) {
        echo 'Registracija nepavyko.';
        exit();
    }
    header('Location: /auth/login-form.php');
    exit();
}
