<?php
session_start();
include '../class/RegistrationManager.php';
$registrationManager = new RegistrationManager();

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $email = $_REQUEST['email'];
    $firstName = $_REQUEST['firstName'];
    $lastName = $_REQUEST['lastName'];
    $password = $_REQUEST['password'];
    $phoneNumber = $_REQUEST['phoneNumber'];
    $code = $_REQUEST['code'];
    $checkInfo = 0;

    if ($code == '123456@Abc') {
        if ($registrationManager->checkName($firstName)) {
            $_SESSION['firstName'] = $firstName;
            $checkInfo++;
        }
        if ($registrationManager->checkName($lastName)) {
            $_SESSION['lastName'] = $lastName;
            $checkInfo++;
        }
        if ($registrationManager->checkEmail($email)) {
            $_SESSION['email'] = $email;
            $checkInfo++;
        }
        if ($registrationManager->checkPassword($password)) {
            $_SESSION['password'] = $password;
            $checkInfo++;
        }
        if ($registrationManager->checkPhoneNUmber($phoneNumber)) {
            $_SESSION['password'] = $phoneNumber;
            $checkInfo++;
        }
        if ($checkInfo==5) {
            header('Location: ../home.php');
        } else {
            $_SESSION['code'] = $code;
            header('Location: ../view/registration.php');
        }
    } else {
        $_SESSION['code'] = false;
        header('Location: ../view/registration.php');
    }

}