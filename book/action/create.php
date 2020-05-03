<?php
session_start();
include '../../database/ConnectDatabase.php';
include '../class/Book.php';
include '../class/BookManager.php';
include '../../function/function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['name'];
    $_SESSION['name'] = $name;
    $author = $_REQUEST['author'];
    $_SESSION['author'] = $author;
    $price = $_REQUEST['price'];
    $_SESSION['price'] = $price;
    $categoryId = $_REQUEST['categoryId'];
    $_SESSION['categoryId'] = $categoryId;
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $_SESSION['imageName'] = $imageName;
    $status = $_REQUEST['status'];
    $bookManager = new BookManager();
    $arrayCategoryId = $bookManager->getAllIdCategory();

    if ($name != '' && $author != '' && $price != '' && ($categoryId == '' || in_array($categoryId, $arrayCategoryId))) {
        $_SESSION['checkImage'] = checkUploadImage($image, '../image/');
        if ($_SESSION['checkImage'] == 'Upload file thành công') {
            $book = new Book($name, $author, $price, $categoryId, $imageName, $status);
            $bookManager->add($book);
            unset($_SESSION['name']);
            unset($_SESSION['author']);
            unset($_SESSION['price']);
            unset($_SESSION['categoryId']);
            unset($_SESSION['imageName']);
            unset($_SESSION['checkImage']);
            header('Location: ../books.php');
        } else {
            header('Location: ../view/add.php');
        }
    } else {
        if ($categoryId != '' && !in_array($categoryId, $arrayCategoryId)) {
            unset($_SESSION['categoryId']);
        }
        header('Location: ../view/add.php');
    }
}
