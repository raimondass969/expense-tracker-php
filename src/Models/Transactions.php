<?php

class Transactions
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addTransaction($transaction_type, $amount, $description, $categoryId)
    {

        try {
            $stmt = $this->pdo->prepare("INSERT INTO transactions(transaction_type,amount, description, category_id) VALUES (:transaction_type, :amount, :description, :category_id)");
            $stmt->execute([
                'transaction_type' => $transaction_type,
                'amount' => $amount,
                'description' => $description,
                'category_id' => $categoryId,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllTransactions($userId)
    {

        try {
            $stmt = $this->pdo->prepare("SELECT * FROM transactions JOIN categories ON transactions.category_id = categories.id WHERE categories.user_id = :user_id");
            $stmt->execute([
                'user_id' => $userId
            ]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteTransaction($id)
    {

        try {
            $stmt = $this->pdo->prepare("DELETE FROM transactions WHERE id=:id");
            $stmt->execute([
                'id' => $id,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
