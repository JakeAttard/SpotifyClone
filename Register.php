<?php

function sanitizeFormUsername($inputText) {

    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

function sanitizeFormString($inputText) {

    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}

function sanitizeFormPassword($inputText) {

    $inputText = strip_tags($inputText);
    return $inputText;
}

if(isSet($_POST['loginBtn'])) {
    //Login Button was pressed
    //echo "Login Button was pressed";
}

if(isSet($_POST['registerBtn'])) {

    $registerUsername = sanitizeFormUsername($_POST['registerUsername']);

    $registerFirstName = sanitizeFormString($_POST['registerFirstName']);

    $registerLastName = sanitizeFormString($_POST['registerLastName']);

    $registerEmail = sanitizeFormString($_POST['registerEmail']);

    $registerConfirmEmail = sanitizeFormString($_POST['registerConfirmEmail']);

    $registerPassword = sanitizeFormPassword($_POST['registerPassword']);

    $registerConfirmPassword = sanitizeFormPassword($_POST['registerConfirmPassword']);

}

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