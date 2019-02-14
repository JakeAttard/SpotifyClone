<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'includes/config.php';

    if(isset($_POST["email"])) {

        $emailTo = $_POST["email"];

        $code = uniqid(true);
        $query = mysqli_query($con, "INSERT INTO resetpasswords(code, email) VALUES('$code', '$emailTo')");

        if(!$query) {
            exit("Error");
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
            $mail->addAddress($emailTo);     // Add a recipient
            $mail->addReplyTo('jake@jakeattard.com', 'Information');
    
            //Content
            $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'SpotifyClone password reset link';
            $mail->Body    = "<h1>You request for a password reset.</h1> Click <a href='$url'>this link</a> to do so.";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $mail->send();
            echo 'Reset password link has been sent to your email';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        exit();
    }

?>

<div class="requestResetForm">
    <form method="POST">
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <br>
        <input type="submit" name="submit" value="Reset email">
    </form>
</div>