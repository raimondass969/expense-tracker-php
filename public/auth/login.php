<?php
session_start();

$pdo = require_once '../../config/database.php';
require_once '../../src/Models/User.php';

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
print_r($_SESSION);
