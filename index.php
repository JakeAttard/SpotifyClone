<?php
include("includes/config.php");

//session_destroy();

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location: register.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SpotifyClone</title>

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div id="nowPlayingBarContainer">
        <div id="nowPlayingBar">

        </div>
    </div>
</body>
</html>