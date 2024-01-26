<?php
require_once 'pdo.php';
$sql = "SELECT * FROM tai_khoan";
$allUser = pdo_query($sql);

function currentUser($id)
{
    $currentUser = pdo_query_one("SELECT * FROM tai_khoan WHERE id = $id ");
    return $currentUser;
}

function addUser($account, $password, $fullName, $email, $avatar, $address, $phone, $role)
{
    pdo_execute("INSERT INTO tai_khoan(ten_tai_khoan,mat_khau,ho_ten,email,anh_dai_dien,dia_chi,sdt,chuc_vu)
    VALUES('$account','$password','$fullName','$email','$avatar','$address','$phone','$role')");
}

function updateUser($account, $password, $fullName, $email, $avatar, $address, $phone, $role, $id)
{
    pdo_execute("UPDATE tai_khoan SET `ten_tai_khoan` = '$account', `mat_khau` = '$password', 
    `ho_ten` = '$fullName', `email` = '$email', `anh_dai_dien` = '$avatar', `dia_chi` = '$address',
    `sdt` = '$phone' , `chuc_vu` = '$role' WHERE id = $id ");
}
function deleteUser($id){
    pdo_execute("DELETE FROM tai_khoan WHERE id = $id");
}