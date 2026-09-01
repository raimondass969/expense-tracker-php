<?php
session_start();
header('Content-type: application/json');
if (!isset($_SESSION['logged_in']) ||  $_SESSION['logged_in'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Neprisijunges']);
    exit();
}
$transactionId = $_GET['id'];
$userId = $_SESSION['user_id'];

$pdo = require_once '../../config/database.php';
require_once '../../src/Models/Transactions.php';

$transaction = new Transactions($pdo);
$deleteTransaction = $transaction->deleteTransaction($transactionId, $userId);

if ($deleteTransaction) {
    echo json_encode(['success' => true, 'message' => 'Transakcija istrinta sekmingai!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Ivyko klaida trinant transakcija!']);
}
