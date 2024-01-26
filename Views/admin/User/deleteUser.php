<?php 
require_once '../../../Models/pdo.php';
require_once '../../../Models/userModel.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
deleteUser($id);
header('location:/DAM2024/index.php?act=user');
?>