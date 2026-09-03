<?php

require_once '../src/Exceptions/DatabaseConnectionException.php';

$username = '';
$password = '';

try {
    $dsn = 'mysql:host=localhost;dbname=expense-tracker;charset=utf8mb4';
    $pdo = new PDO($dsn, $username, $password);

    return $pdo;
} catch (PDOException $e) {
    throw new DatabaseConnectionException('Database connection failed');
}
