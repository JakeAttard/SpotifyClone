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

if(isSet($_POST['registerBtn'])) {

    $registerUsername = sanitizeFormUsername($_POST['registerUsername']);

    $registerFirstName = sanitizeFormString($_POST['registerFirstName']);

    $registerLastName = sanitizeFormString($_POST['registerLastName']);

    $registerEmail = sanitizeFormString($_POST['registerEmail']);

    $registerConfirmEmail = sanitizeFormString($_POST['registerConfirmEmail']);

    $registerPassword = sanitizeFormPassword($_POST['registerPassword']);

    $registerConfirmPassword = sanitizeFormPassword($_POST['registerConfirmPassword']);

    $wasSuccessful = $account->register($registerUsername, $registerFirstName, $registerLastName, $registerEmail, $registerConfirmEmail, $registerPassword, $registerConfirmPassword);

    if($wasSuccessful) {
        header("Location: index.php);
    }
}

?>