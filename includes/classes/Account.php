<?php

class Account {

    public function __construct() {

    }

    public function register() {
        $this->validateUsername($registerUsername);
        $this->validateFirstName($registerFirstName);
        $this->validateLastName($registerLastName);
        $this->validateEmails($registerEmail, $registerConfirmEmail);
        $this->validatePasswords($registerPassword, $registerConfirmPassword);
    }

    private function validateUsername($username) {
        echo "username function called";
    }

    private function validateFirstName($firstName) {

    }

    private function validateLastName($lastName) {

    }

    private function validateEmails($email, $confirmEmail) {

    }

    private function validatePasswords($password, $confirmPassword) {

    }

}