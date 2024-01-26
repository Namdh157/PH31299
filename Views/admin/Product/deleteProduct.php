<?php 
require_once '../../../Models/pdo.php';
require_once '../../../Models/productModel.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
deleteProduct($id);
header('location:/DAM2024/index.php?act=product');
?>