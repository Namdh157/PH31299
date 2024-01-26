<?php 
require_once 'Views/component/header.php';
require_once 'Models/categoryModel.php';
require_once 'Models/productModel.php';
require_once 'Models/commentModel.php';
require_once 'Models/cartModel.php';
require_once 'Models/userModel.php';
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
    <main id="main">
        <?php
        require_once 'Models/pdo.php';
        if (isset($_GET['act'])) {
            $act = trim($_GET['act']);
            switch ($act) {
                case 'admin':
                    headerAdmin();
                    include 'Views/admin/home.php';
                    break;
                case 'category':
                    headerAdmin();
                    include 'Views/admin/Category/category.php';
                    break;
                case 'product':
                    headerAdmin();
                    include 'Views/admin/Product/product.php';
                    break;
                case 'comment':
                    headerAdmin();
                    include 'Views/admin/Comment/comment.php';
                    break;
                case 'cart':
                    headerAdmin();
                    include 'Views/admin/Cart/cart.php';
                    break;
                case 'user':
                    headerAdmin();
                    include 'Views/admin/User/user.php';
                    break;
                default:   
            }
        } else {
            include 'Views/admin/home.php';
        }
        ?>
    </main>

</body>
<footer class="bg-body-tertiary text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2020 Copyright:
    <a class="text-body" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<script>
    function deleteConfirm(url) {
        if (confirm("Bạn muốn xóa ko")) {
            document.location = url;
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>