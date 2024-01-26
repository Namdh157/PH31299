<?php
require_once '../../../Models/pdo.php';
require_once '../../component/header.php';
require_once '../../../Models/categoryModel.php';

if (isset($_POST['addBtn'])) {
    $nameCategory = $_POST['nameCategory'];
    addCategory($nameCategory);
    header('location:/DAM2024/index.php?act=category');
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
    <?php headerAdmin() ?>
    <div class="container mt-4">
        <a href="/DAM2024/index.php?act=category"><button class="btn btn-danger">Quay lại</button></a>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">ID danh mục</label>
                <input type="text" disabled class="form-control">
                <div class="form-text">ID của danh mục không thể nhập</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" name="nameCategory">
            </div>
            <button type="submit" name="addBtn" class="btn btn-success">Xác nhận</button>
            <button type="reset" class="btn btn-secondary">Nhập lại</button>
        </form>
    </div>
</body>

</html>