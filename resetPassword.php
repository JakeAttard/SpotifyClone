<?php 
include("includes/config.php");

if(!isset($_GET["code"])) {
    exit("Sorry this link is broken. Please try again.");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($con, "SELECT email FROM resetpasswords WHERE code='$code'");

if(mysqli_num_rows($getEmailQuery) == 0) {
    exit("Sorry this link is broken. Please try again.");
}

if(isset($_POST["password"])) {
    $password = $_POST["password"];
    $password = md5($password);

    $row = mysqli_fetch_array($getEmailQuery);
    $email = $row["email"];

    $query = mysqli_query($con, "UPDATE users SET password='$password' WHERE email='$email'");
    
    if($query) {
        $query = mysqli_query($con, "DELETE FROM resetpasswords WHERE code='$code'");
        exit("Your password has been updated.");
    } else {
        exit("Something went wrong");
    }
}

?>

<form method="POST">
    <input type="password" name="password" placeholder="Enter your new password">
    <br>
    <input type="submit" name="submit" value="Update password">
</form>