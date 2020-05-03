<?php
session_start();
include '../../database/ConnectDatabase.php';
include '../class/BookManager.php';
include '../../function/function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_REQUEST['id'];
    $_SESSION['idOfUpdate'] = $id;
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
        if ($_SESSION['checkImage'] == 'Lỗi : File đã tồn tại.' && $_SESSION['imageName'] == $_SESSION['imageById']) {
            update($bookManager, $id, $name, $author, $price, $categoryId, $imageName, $status);
        } elseif ($_SESSION['checkImage'] == 'Upload file thành công') {
            unlink('../image/' . $_SESSION['imageById']);
            update($bookManager, $id, $name, $author, $price, $categoryId, $imageName, $status);
        } else {
            header('Location: ../view/update.php');
        }
    } else {
        if ($categoryId != '' && !in_array($categoryId, $arrayCategoryId)) {
            unset($_SESSION['categoryId']);
        }
        header('Location: ../view/update.php');
    }
}
function update($bookManager, $id, $name, $author, $price, $categoryId, $imageName, $status)
{
    $bookManager->update($id, $name, $author, $price, $categoryId, $imageName, $status);
    unset($_SESSION['idOfUpdate']);
    unset($_SESSION['name']);
    unset($_SESSION['author']);
    unset($_SESSION['price']);
    unset($_SESSION['categoryId']);
    unset($_SESSION['imageName']);
    unset($_SESSION['imageById']);
    unset($_SESSION['checkImage']);
    header('Location: ../books.php');
}

