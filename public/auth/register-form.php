<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register page</title>
</head>

<body>
    <form method="POST" action="register.php">
        <div class="registerForm">
            <div class="registerUsername">
                <label for="register_username">Iveskite savo varda</label>
                <input id="register_username" name="register_username" type="text">
            </div>
            <div class="registerEmail">
                <label for='register_email'> Iveskite savo el pasta</label>
                <input id="register_email" name="register_email" type="email">
            </div>
            <div class="registerPassword">
                <label for="register_password">Iveskite savo slaptazodi</label>
                <input id="register_password" name="register_password" type="password">
            </div>
            <div class="confirmRegisterPassword">
                <label for="confirm_register_password">Pakartokite savo slaptazodi</label>
                <input id="confirm_register_password" name="confirm_register_password" type="password">
            </div>
        </div>
        <button type="submit">Registracija</button>
    </form>

</body>

</html>
