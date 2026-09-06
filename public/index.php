<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: /transactions/list.php');
    exit();
}

header('Location: /auth/login-form.php');
