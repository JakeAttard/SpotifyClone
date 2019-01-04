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

    private function validateUsername($username) {

        if(strlen($username) > 25 || strlen($username) < 5){
            array_push($this->errorArray, "Your username needs to be between 5-25 characters");
            return;
        }

        // TODO: Check If Username Exists

    }

    private function validateFirstName($firstName) {

        if(strlen($firstName) > 25 || strlen($firstName) < 2){
            array_push($this->errorArray, "Your first name needs to be between 2-25 characters");
            return;
        }
    }

    private function validateLastName($lastName) {

        if(strlen($lastName) > 25 || strlen($lastName) < 2){
            array_push($this->errorArray, "Your last name needs to be between 5-25 characters");
            return;
        }
    }

    private function validateEmails($email, $confirmEmail) {

        if($email != $confirmEmail) {
            array_push($this->errorArray, "Your emails don't match");
            return;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, "Your email is invalid");
            return;
        }

        // TODO: Check that username hasn't been used
    }

    private function validatePasswords($password, $confirmPassword) {

        if($password != $confirmPassword) {
            array_push($this->errorArray, "Your passwords don't match");
            return;
        }

        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, "Your password can only contain numbers and letters");
            return;
        }

        if(strlen($password) > 30 || strlen($password) < 6){
            array_push($this->errorArray, "Your password needs to be between 6-30 characters");
            return;
        }
    }

}