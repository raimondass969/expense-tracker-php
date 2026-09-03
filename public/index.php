<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: /transactions/list.php');
    exit();
}

header('Location: /auth/login-form.php');
?>

<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home page</title>
</head>

<body>
    <button onclick="window.location.href='/transactions/list.php' ">Transaction list</button>
    <button onclick="window.location.href='/auth/logout.php'">Log-out</button>
</body>

</html>
-->
