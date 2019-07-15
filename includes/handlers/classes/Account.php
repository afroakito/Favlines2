<?php

class Account {

    private $con;
    private $errorArray;

    public function __construct($con) {

        $this->errorArray = array();
        $this->con = $con;

    }

    public function login($un, $pw) {

        $pw = md5($pw);

        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

        if(mysqli_num_rows($query) == 1) {
            return true;
        }
        else {
            array_push($this->errorArray, "Your username or password is incorrect");
            return false;
        }

    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {

        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);

        if(empty($this->errorArray) == true) {
            // INSERT INTO DATABASE
            return true;
        }

    }

    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    // INSERT FUNCTION FROM HERE

    private function validateUsername($un) {

        if(strlen($un) > 25 || strlen($un) < 5) {

            array_push($this->errorArray, "Username must be between 5 and 25 characters");
            return;
        }

    }

    private function validateFirstName($fn) {

        if(strlen($fn) > 25 || strlen($fn) < 5) {

            array_push($this->errorArray, "First name must be between 5 and 25 characters");
            return;
        }

    }

    private function validateLastName($ln) {

        if(strlen($ln) > 25 || strlen($ln) < 5) {

            array_push($this->errorArray, "Last name must be between 5 and 25 characters");
            return;
        }

    }

    private function validateEmails($em, $em2) {

        if($em != $em2) {

            array_push($this->errorArray, "Your emails do not match");
            return;
        }

        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, "Your email is invalid");
            return;
        }

    }

    private function validatePasswords($pw, $pw2) {

        if($pw != $pw2) {

            array_push($this->errorArray, "Your passwords do not match");
            return;
        }

        if(preg_match('/[^A-Za-z0-9^]/', $pw)) {
            array_push($this->errorArray, "Your password can only contians numbers and characters");
            return;
        }

    }

}









?>
