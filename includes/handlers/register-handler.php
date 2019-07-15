<?php

function sanitizeFormPassword($inputText) {

    $inputText = strip_tags($inputText);
    return $inputText;
}

function sanitizeFormUsername($inputText) {

    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

function sanitizeFormString($inputText) {

    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));   // change all characters to lowercase in the fisrst place, and change the first character to uppercase
                                                    //e.g. 'aKiTo' => 'akito' => 'Akito'
    return $inputText;
}

if(isset($_POST['registerButton'])) {
    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $email2 = sanitizeFormString($_POST['email2']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);


    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

    if($wasSuccessful == true) {

        header("Location: index.php");

    }
}
?>
