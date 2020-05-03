<?php
include '../../database/ConnectDatabase.php';
include '../class/Category.php';
include '../class/CategoryManager.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['name'];
    $categoryManager = new CategoryManager();
    $category = new Category($name);
    if (!empty($name)) {
        $categoryManager->add($category);
        header('Location: ../categories.php');
    } else {
        header('Location: ../view/add.php');
    }
}