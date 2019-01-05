<?php

if(isSet($_POST['loginBtn'])) {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $result = $account->login($username, $password);

    if($result == true) {
        header("Location: index.php");
    }
}

?>