<?php
    ob_start();

    $timezone = date_default_timezone_set("Australia/Brisbane");

    $con = mysqli_connect("localhost", "root", "root", "spotifyclone");

    if(mysqli_connect_error()) {
        echo "Failed to connect: " . mysqli_connect_error();
    }
?>