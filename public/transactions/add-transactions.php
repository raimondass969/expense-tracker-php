<?php

use App\Models\Transactions;
use App\Services\Csrf;

session_start();

require_once  __DIR__ . '/../../vendor/autoload.php';

$pdo = require_once __DIR__ . '/../../config/database.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../auth/login-form.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_type = $_POST['transaction_type'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $categoryId = $_POST['category_id'];
    $userId = $_SESSION['user_id'];
    $token = $_POST['csrf_token'];

    if (!Csrf::validateToken($token)) {
        exit('Invalid CSRF token');
    }

    $transaction = new Transactions($pdo);
    $transactionInfo = $transaction->addTransaction($transaction_type, $amount, $description, $categoryId, $userId);

    if (!isset($transactionInfo) || !$transactionInfo) {
        $_SESSION['error_message'] = 'Nepavyko prideti transakcijos!';
        header('Location: add-transaction-form.php');
        exit();
    } else {
        $_SESSION['success_message'] = 'Transakcija sekmingai prideta!';
        header('Location: /transactions/list.php');
        exit();
    }
}
