<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create new transaction</title>
</head>

<?php if (isset($_SESSION['success_message'])) : ?>
    <p><?= $_SESSION['success_message'] ?></p>
    <?php unset($_SESSION['success_message']); ?>
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
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                    </select>
                </div>

            </div>
        </div>
        <button type="submit">Prideti transakcija!</button>
    </form>
</body>

</html>
