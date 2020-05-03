<?php
include '../../database/ConnectDatabase.php';
include '../class/BookManager.php';
$bookManager = new BookManager();
$id = $_REQUEST['id'];
$imagePath = $bookManager->getImageById($id);
unlink('../image/'.$imagePath['image']);
$bookManager->delete($id);
header('Location: ../books.php');