<?php

use App\Models\Transactions;

$pdo = require_once __DIR__ . '/../../bootstrap.php';

header('Content-type: application/json');
if (!isset($_SESSION['logged_in']) ||  $_SESSION['logged_in'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Neprisijunges']);
    exit();
}
$transactionId = $_GET['id'];
$userId = $_SESSION['user_id'];

$transaction = new Transactions($pdo);
$deleteTransaction = $transaction->deleteTransaction($transactionId, $userId);

if ($deleteTransaction) {
    echo json_encode(['success' => true, 'message' => 'Transakcija istrinta sekmingai!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Ivyko klaida trinant transakcija!']);
}
