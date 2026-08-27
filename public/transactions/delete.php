<?php
session_start();

if (!isset($_SESSION['logged_in']) ||  $_SESSION['logged_in'] !== true) {
    header('Location: ../auth/login-form.php');
    exit();
}
$transactionId = $_GET['id'];

$pdo = require_once '../../config/database.php';
require_once '../../src/Models/Transactions.php';

$transaction = new Transactions($pdo);
$deleteTransaction = $transaction->deleteTransaction($transactionId);

if (!$deleteTransaction) {
    $_SESSION['error_message'] = 'Nepavyko istrinti transakcijos';
    header('Location: list.php');
    exit();
} else {
    $_SESSION['success_message'] = 'Transakcija sekmingai istrinta!';
    header('Location: list.php');
    exit();
}
