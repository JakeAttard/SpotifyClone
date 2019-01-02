<?php
    include("includes/classes/Account.php");

    $account = new Account();
    $account->register();

    include("includes/handlers/registerHandler.php");
    include("includes/handlers/loginHandler.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SpotifyClone</title>
</head>
<body>

    <div id="inputContainer">
        <form id="loginForm" action="Register.php" method="POST">
            <h2>Login To Account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="Enter Your Username" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" name="loginPassword" type="password" placeholder="Enter Your Password" required>
            </p>

            <button type="submit" name="loginBtn">LOG IN</button>
        </form>

        <form id="registerForm" action="Register.php" method="POST">
            <h2>Create your free account</h2>
            <p>
                <label for="registerUsername">Username</label>
                <input id="registerUsername" name="registerUsername" type="text" placeholder="Username" required>
            </p>
            <p>
                <label for="registerFirstName">First Name</label>
                <input id="registerFirstName" name="registerFirstName" type="text" placeholder="First Name" required>
            </p>
            <p>
                <label for="registerLastName">Last Name</label>
                <input id="registerLastName" name="registerLastName" type="text" placeholder="Last Name" required>
            </p>
            <p>
                <label for="registerEmail">Email</label>
                <input id="registerEmail" name="registerEmail" type="email" placeholder="Email" required>
            </p>
            <p>
                <label for="registerConfirmEmail">Confirm Email</label>
                <input id="registerConfirmEmail" name="registerConfirmEmail" type="email" placeholder="Confirm Email" required>
            </p>
            <p>
                <label for="registerPassword">Password</label>
                <input id="registerPassword" name="registerPassword" type="password" placeholder="Enter Your Password" required>
            </p>
            <p>
                <label for="registerConfirmPassword">Confirm Password</label>
                <input id="registerConfirmPassword" name="registerConfirmPassword" type="password" placeholder="Confirm Your Password" required>
            </p>

            <button type="submit" name="registerBtn">SIGN UP</button>
        </form>
    </div>

</body>
</html>