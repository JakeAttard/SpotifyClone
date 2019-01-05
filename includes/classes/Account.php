<?php

class Account {

    private $errorArray;

    public function __construct() {
        $this->errorArray = array();
    }

    public function register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword) {
        $this->validateUsername($username);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $confirmEmail);
        $this->validatePasswords($password, $confirmPassword);

        if(empty($this->errorArray)) {
            //Insert into db
            return true;
        } else {
            return false;
        }
    }

    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function validateUsername($username) {

        if(strlen($username) > 25 || strlen($username) < 5){
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        // TODO: Check If Username Exists

    }

    private function validateFirstName($firstName) {

        if(strlen($firstName) > 25 || strlen($firstName) < 2){
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }

    private function validateLastName($lastName) {

        if(strlen($lastName) > 25 || strlen($lastName) < 2){
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
        }
    }

    private function validateEmails($email, $confirmEmail) {

        if($email != $confirmEmail) {
            array_push($this->errorArray, Constants::$emailDoNotMatch);
            return;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        // TODO: Check that username hasn't been used
    }

    private function validatePasswords($password, $confirmPassword) {

        if($password != $confirmPassword) {
            array_push($this->errorArray, Constants::$passwordsDoNotMatch);
            return;
        }

        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
            return;
        }

        if(strlen($password) > 30 || strlen($password) < 6){
            array_push($this->errorArray, Constants::$passwordCharacters);
            return;
        }
    }

}