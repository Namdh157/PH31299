<?php 
require_once 'pdo.php';
$sql = "SELECT * FROM danh_muc";
$allCategory = pdo_query($sql);

function currentCategory($id){
    $currentCategory = pdo_query_one("SELECT * FROM danh_muc WHERE id = $id");
    return $currentCategory;
}

function addCategory($nameCategory){
    pdo_execute("INSERT INTO `danh_muc`(`ten_danh_muc`) VALUES('$nameCategory') ");
}

function updateCategory($nameCategory,$id){
    pdo_execute("UPDATE danh_muc SET `ten_danh_muc` = '$nameCategory' WHERE danh_muc.id = $id ");
}

function deleteCategory($id){
    pdo_execute("DELETE FROM danh_muc WHERE id = $id");
}
?>