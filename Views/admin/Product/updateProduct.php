<?php
require_once '../../../Models/pdo.php';
require_once '../../component/header.php';
require_once '../../../Models/productModel.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $currentProduct = currentProduct($id);
}

if(isset($_POST['upBtn'])){
    $nameProduct = $_POST['nameProduct'];
    $priceProduct = $_POST['priceProduct'];
    $target_dir = "../../../image/";
    $imgUrl = $_FILES['imageProduct']['name'];
    if(empty($imgUrl)){
        $imgUrl = $currentProduct['anh'];
    }else{
        $imgUrl = $_FILES['imageProduct']['name'];
        move_uploaded_file($_FILES['imageProduct']['tmp_name'],$target_dir.$imgUrl);
    };
    $descriptionProduct = $_POST['descriptionProduct'];
    $categoryProduct = $_POST['categoryProduct'];
    updateProduct($nameProduct,$priceProduct,$imgUrl,$descriptionProduct,$categoryProduct,$id);
    header('location:/DAM2024/index.php?act=product');
}
// var_dump($currentProduct);
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
                <input type="text" class="form-control" name="nameProduct" value="<?=$currentProduct['ten_san_pham'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Giá sản phẩm</label>
                <input type="text" class="form-control" name="priceProduct" value="<?=$currentProduct['gia'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="imageProduct">
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả sản phẩm</label>
                <input type="text" class="form-control" name="descriptionProduct" value="<?=$currentProduct['mo_ta'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <select id="" class="form-control" name ="categoryProduct">
                    <?php foreach (categoryProduct() as $key => $value) { ?>
                        <option 
                            value="<?= $value['id'] ?>"
                            <?php echo $value['id'] == $currentProduct['id_danh_muc'] ? 'selected' : ''   ?>
                        >
                            <?= $value['ten_danh_muc'] ?>
                        </option>
                        
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="upBtn" class="btn btn-success">Xác nhận</button>
            <button type="reset" class="btn btn-secondary">Nhập lại</button>
        </form>
    </div>
</body>