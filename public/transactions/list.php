<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../auth/login-form.php');
    exit();
}
$userId = $_SESSION['user_id'];
echo $_SESSION['email'];

$pdo = require_once '../../config/database.php';
require_once '../../src/Models/Transactions.php';

$transactionsList = new Transactions($pdo);
$transactions = $transactionsList->getAllTransactions($userId);


foreach ($transactions as $transaction) {
    echo $transaction['transaction_type'];
    echo $transaction['amount'];
    echo $transaction['DESCRIPTION'];
    echo "<button onclick='transaction({$transaction['transaction_id']})'>Istrinti</button>";
}
?>

<script src="transactions.js"></script>
