<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");

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

    <script src="assets/js/script.js"></script>

</head>
<body>

<div id="mainContainer">

    <div id="topContainer">

        <?php include("includes/navBarContainer.php"); ?>

        <div id="mainViewContainer">
            <div id="mainContent">