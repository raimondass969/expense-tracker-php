<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../auth/login-form.php');
    exit();
}

$pdo = require_once '../../config/database.php';
require_once '../../src/Models/Transactions.php';

$transaction_type = $_POST['transaction_type'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$categoryId = $_POST['category_id'];

$transaction = new Transactions($pdo);
$transactionInfo = $transaction->addTransaction($transaction_type, $amount, $description, $categoryId);

if (!isset($transactionInfo) || !$transactionInfo) {
    $_SESSION['error_message'] = 'Nepavyko prideti transakcijos!';
    header('Location: add-transactions.php');
} else {
    $_SESSION['success_message'] = 'Transakcija sekmingai prideta!';
    header('Location: ../../index.php');
}
