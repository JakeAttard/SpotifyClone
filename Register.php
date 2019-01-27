<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account($con);

    include("includes/handlers/registerHandler.php");
    include("includes/handlers/loginHandler.php");

    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'premium28.web-hosting.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'jake@jakeattard.com';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('jake@jakeattard.com', 'SpotifyClone');
    $mail->addAddress('jake@jakeattard.com');     // Add a recipient
    $mail->addReplyTo('jake@jakeattard.com', 'Information');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SpotifyClone</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>

    <?php
    if(isset($_POST['registerBtn'])) {
        echo '<script>
                $(document).ready(function () {
                    $("#loginForm").hide();
                    $("#registerForm").show();
                });
              </script>';
    } else {
        echo '<script>
                $(document).ready(function () {
                    $("#loginForm").show();
                    $("#registerForm").hide();
                });
              </script>';
    }
    ?>

    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login To Account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="Enter Your Username" value="<?php getInputValue('loginUsername') ?>" required>
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Enter Your Password" required>
                    </p>

                    <button type="submit" name="loginBtn">LOG IN</button>



                    <div class="hasAccountText">
                       <span id="hideLogin">Don't have an account yet? Signup here.</span>
                    </div>
                </form>

                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create your free account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
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
                        <?php echo $account->getError(Constants::$emailTaken); ?>
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

                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Log in here.</span>
                    </div>

                </form>
            </div>
            <div id="loginText">
                <h1>Get great music, right now</h1>
                <h2>Listen to loads of songs for free.</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create your own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>

        </div>
    </div>
</body>
</html>