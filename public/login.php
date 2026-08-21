<?php
session_start();

$pdo = require_once '../config/database.php';
require_once '../src/Models/User.php';
$email = 'test@gmail.com';

$user = new User($pdo);
$confirmedUser = $user->userLogin($email, 'password');

if (!$confirmedUser) {
    echo "Prisijungimas nepavyko";
    return false;
}

$_SESSION['logged_in'] = true;
$_SESSION['email'] = $email;
print_r($_SESSION);
