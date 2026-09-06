<?php
session_start();
require_once '../../src/Services/Csrf.php';
$token = Csrf::generateToken();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log In</title>
</head>

<body>
    <form method="POST" action="login.php">
        <div class="loginForm">
            <div class="emailForm">
                <label for="login_email">Iveskite email</label>
                <input id='login_email' type="text" name='email'>
            </div>
        </div>
        <div class="passwordForm">
            <label for="login_password">Iveskite slaptazodi</label>
            <input id="login_password" type="password" name="password">
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $token ?>">
        <button>Prisijungti</button>

    </form>
</body>

</html>
