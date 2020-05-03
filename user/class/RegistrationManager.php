<?php


class RegistrationManager
{
    function checkName($name) {
        $regexp = '/^[A-Z]{1}[a-z]{0,8}$/';
        return preg_match($regexp,$name);
    }

    function checkEmail($email) {
    $regexp = '/^[a-z][a-z0-9\.]*@[a-z0-9]{2,8}\.[a-z0-9]{2,5}$/';
    return preg_match($regexp,$email);
    }

    function checkPassword($password) {
        $regexp = '/^(?=.*[A-Z]+)(?=.*\d+)(?=.*[!@#\$&\*]+)[\w!@#\$&\*]{8,20}$/';
        return preg_match($regexp,$password);
    }
    function checkPhoneNUmber($phoneNumber)
    {
        $regexp1 = '/^03[2-9]{1}\d{7}$/';
        $regexp2 = '/^09[0-46-8]{1}\d{7}$/';
        $regexp3 = '/^08[1-689]{1}\d{7}$/';
        $regexp4 = '/^07[06-9]{1}\d{7}$/';
        return preg_match($regexp1, $phoneNumber) || preg_match($regexp2, $phoneNumber) || preg_match($regexp3, $phoneNumber) || preg_match($regexp4, $phoneNumber);
    }
}