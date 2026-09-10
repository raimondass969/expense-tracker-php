<?php

use App\Services\Csrf;
use App\Models\User;

$pdo = require_once __DIR__ . '/../../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /auth/login-form.php');
    exit();
}

$token = $_POST['csrf_token'];

if (!Csrf::validateToken($token)) {
    exit('Invalid token');
}

$email = $_POST['email'];
$password = $_POST['password'];


$user = new User($pdo);
$confirmedUser = $user->userLogin($email, $password);

if (!$confirmedUser) {
    echo "Prisijungimas nepavyko";
    return false;
}

$_SESSION['logged_in'] = true;
$_SESSION['email'] = $email;
$_SESSION['user_id'] = $confirmedUser['id'];

header('Location: /transactions/list.php');
exit();
