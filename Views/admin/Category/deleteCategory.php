<?php 
require_once '../../../Models/pdo.php';
require_once '../../component/header.php';
require_once '../../../Models/categoryModel.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
deleteCategory($id);
header('location:/DAM2024/index.php?act=category');
?> 
