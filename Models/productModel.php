<?php
require_once 'pdo.php';
$sql = "SELECT san_pham.*,danh_muc.ten_danh_muc FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc = danh_muc.id";
$allProduct = pdo_query($sql);

function currentProduct($id)
{
    $currentProduct = pdo_query_one("SELECT * FROM san_pham WHERE id = $id");
    return $currentProduct;
}

function addProduct($nameProduct, $priceProduct, $imageProduct, $descriptionProduct, $categoryProduct)
{
    pdo_execute("INSERT INTO san_pham(`ten_san_pham`,`gia`,`anh`,`mo_ta`,`id_danh_muc`)
    VALUES('$nameProduct','$priceProduct','$imageProduct','$descriptionProduct','$categoryProduct')");
}

function updateProduct($nameProduct, $priceProduct, $imageProduct, $descriptionProduct, $idCategory, $id)
{
    pdo_execute("UPDATE san_pham SET `ten_san_pham` = '$nameProduct', `gia` = '$priceProduct',
    `anh` = '$imageProduct',`mo_ta` = '$descriptionProduct', `id_danh_muc` = '$idCategory' WHERE id = $id");
}

function deleteProduct($id){
    pdo_execute("DELETE FROM san_pham WHERE id = $id");
}

function nineProduct()
{
    $nineProduct = pdo_query("SELECT * FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc = danh_muc.id LIMIT 9");
    return $nineProduct;
}

function categoryProduct()
{
    $categoryProduct = pdo_query("SELECT * FROM danh_muc");
    return $categoryProduct;
}

