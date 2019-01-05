<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account();

    include("includes/handlers/registerHandler.php");
    include("includes/handlers/loginHandler.php");

    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
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
                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <label for="registerUsername">Username</label>
                <input id="registerUsername" name="registerUsername" type="text" placeholder="Username" value="<?php getInputValue('registerUsername')?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <label for="registerFirstName">First Name</label>
                <input id="registerFirstName" name="registerFirstName" type="text" placeholder="First Name" value="<?php getInputValue('registerFirstName')?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                <label for="registerLastName">Last Name</label>
                <input id="registerLastName" name="registerLastName" type="text" placeholder="Last Name" value="<?php getInputValue('registerLastName')?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$emailDoNotMatch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <label for="registerEmail">Email</label>
                <input id="registerEmail" name="registerEmail" type="email" placeholder="Email" value="<?php getInputValue('registerEmail')?>" required>
            </p>
            <p>
                <label for="registerConfirmEmail">Confirm Email</label>
                <input id="registerConfirmEmail" name="registerConfirmEmail" type="email" placeholder="Confirm Email" value="<?php getInputValue('registerConfirmEmail')?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
                <?php echo $account->getError(Constants::$passwordCharacters); ?>
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