<?php
session_start();
include '../../database/ConnectDatabase.php';
include '../class/CategoryManager.php';

$id = $_REQUEST['id'];
$_SESSION['idOfUpdate'] = $id;
$name = $_POST['name'];
$_SESSION['name'] = $name;
$categoryManager = new CategoryManager();
if (!empty($name)) {
    $categoryManager->update($id, $name);
    unset($_SESSION['idOfUpdate']);
    unset($_SESSION['name']);
    header('Location: ../categories.php');
} else {
    header('Location: ../view/update.php');
}