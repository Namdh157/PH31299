<?php
require_once '../../../Models/pdo.php';
require_once '../../component/header.php';
require_once '../../../Models/productModel.php';

if(isset($_POST['addBtn'])){
    $nameProduct = $_POST['nameProduct'];
    $priceProduct = $_POST['priceProduct'];
    $target_dir = "../../../image/";
    $imgUrl = $_FILES['imageProduct']['name'];
    // echo "<pre>";
    // print_r($imgUrl);
    // die;
    move_uploaded_file($_FILES['imageProduct']['tmp_name'],$target_dir.$imgUrl);
    $descriptionProduct = $_POST['descriptionProduct'];
    $categoryProduct = $_POST['categoryProduct'];
    addProduct($nameProduct,$priceProduct,$imgUrl,$descriptionProduct,$categoryProduct);
    header('location:/DAM2024/index.php?act=product');
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
        <a href="/DAM2024/index.php?act=product"><button class="btn btn-danger">Quay lại</button></a>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="nameProduct">
            </div>

            <div class="mb-3">
                <label class="form-label">Giá sản phẩm</label>
                <input type="text" class="form-control" name="priceProduct">
            </div>

            <div class="mb-3">
                <label class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="imageProduct">
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả sản phẩm</label>
                <input type="text" class="form-control" name="descriptionProduct">
            </div>

            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <select id="" class="form-control" name ="categoryProduct">
                    <option value="">Hãng</option>
                    <?php foreach (categoryProduct() as $key => $value) { ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['ten_danh_muc'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="addBtn" class="btn btn-success">Xác nhận</button>
            <button type="reset" class="btn btn-secondary">Nhập lại</button>
        </form>
    </div>
</body>