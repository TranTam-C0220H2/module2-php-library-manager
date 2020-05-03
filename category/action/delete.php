<?php
include '../../database/ConnectDatabase.php';
include '../class/CategoryManager.php';
$categoryManager = new CategoryManager();
$id = $_REQUEST['id'];
$categoryManager->delete($id);
header('Location: ../categories.php');