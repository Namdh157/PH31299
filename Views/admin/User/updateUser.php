<?php
require_once '../../../Models/pdo.php';
require_once '../../component/header.php';
require_once '../../../Models/userModel.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $currentUser = currentUser($id);
}

if(isset($_POST['upBtn'])){
    $account = $_POST['account'];
    $password = $_POST['password'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $target_dir = "../../../image/";
    $imgUrl = $_FILES['imageUser']['name'];
    if(empty($imgUrl)){
        $imgUrl = $currentUser['anh_dai_dien'];
    }else{
        $imgUrl = $_FILES['imageUser']['name'];
        move_uploaded_file($_FILES['imageUser']['tmp_name'],$target_dir.$imgUrl);
    }
    
    updateUser($account, $password, $fullName, $email, $imgUrl, $address, $phone, $role,$id);
    header('location:/DAM2024/index.php?act=user');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php headerAdmin()  ?>
    <div class="container mt-4">
        <a href="/DAM2024/index.php?act=user"><button class="btn btn-danger">Quay lại</button></a>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Tên tài khoản</label>
                <input type="text" class="form-control" name="account" value="<?= $currentUser['ten_tai_khoan'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="text" class="form-control" name="password" value="<?= $currentUser['mat_khau'] ?>" >
            </div>

            <div class="mb-3">
                <label class="form-label">Họ và tên</label>
                <input type="text" class="form-control" name="fullName" value="<?= $currentUser['ho_ten'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $currentUser['email'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Ảnh đại diện</label>
                <input type="file" class="form-control" name="imageUser">
            </div>

            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="address" value="<?= $currentUser['dia_chi'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" name="phone" value="<?= $currentUser['sdt'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Chức vụ</label>
                <select name="role" class="form-control">
                  <?php 
                  if($currentUser['chuc_vu'] == 1){ ?>
                    <option value="1" selected>Khách hàng</option>
                    <option value="2">Admin</option>
                  <?php } elseif($currentUser['chuc_vu'] == 2){?>
                    <option value="1">Khách hàng</option>
                    <option value="2" selected>Admin</option>
                 <?php } ?>
                </select>
            </div>

            <button type="submit" name="upBtn" class="btn btn-success">Xác nhận</button>
            <button type="reset" class="btn btn-secondary">Nhập lại</button>
        </form>
    </div>
</body>