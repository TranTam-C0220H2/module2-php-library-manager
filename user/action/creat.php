<?php
session_start();
include '../../database/ConnectDatabase.php';
include '../class/User.php';
include '../class/RegistrationManager.php';
$registrationManager = new RegistrationManager();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $password = $_REQUEST['password'];
    $phoneNumber = $_REQUEST['phoneNumber'];
    $code = $_REQUEST['code'];
    $checkInfo = 0;

    if ($code == '123456@Abc') {
        if ($registrationManager->checkName($name)) {
            $_SESSION['name'] = $name;
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
            $_SESSION['phoneNumber'] = $phoneNumber;
            $checkInfo++;
        }
        if ($checkInfo == 4) {
            $user = new User($name, $email, $password, $phoneNumber);
            $registrationManager->add($user);
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            unset($_SESSION['phoneNumber']);
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