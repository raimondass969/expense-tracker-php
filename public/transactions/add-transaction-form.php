<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: /auth/login-form.php');
    exit();
}

$pdo = require_once '../../config/database.php';
require_once '../../src/Models/Category.php';

$category = new Category($pdo);
$userCategories = $category->getCategoriesForUser($_SESSION['user_id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create new transaction</title>
</head>

<?php if (isset($_SESSION['error_message'])) : ?>
    <p><?= $_SESSION['error_message'] ?></p>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<body>
    <form method="POST" action="add-transactions.php">
        <div class="transactionForm">
            <div class="transaction_type">
                <label for='transaction_type'>Transakcijos tipas: </label>

                <select name='transaction_type' id='transaction_type'>
                    <option value='INCOME'>Income</option>
                    <option value='EXPENSE'>Expense</option>
                </select>

                <div class="transactionsAmount">
                    <label for='amount'>Iveskite suma €: </label>
                    <input id='amount' name='amount' type='number'>
                </div>

                <div class="transactionsDescription">
                    <label for='description'>Iveskite transakcijos aprasyma </label>
                    <input id='description' name='description' type='text'>
                </div>

                <div class="transactionCategory">

                    <label for='category_id'>Pasirinkite kategorija: </label>
                    <select name='category_id' id='category_id'>
                        <?php
                        foreach ($userCategories as $category) {
                            echo "<option value='{$category['id']}'>{$category['NAME']}</option>";
                        }
                        ?>
                    </select>
                </div>

            </div>
        </div>
        <button type="submit">Prideti transakcija!</button>
    </form>
</body>

</html>
