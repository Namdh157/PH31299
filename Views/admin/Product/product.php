<?php 
require_once 'Models/productModel.php';
?>
<div class="container mt-4">
  <a href="Views/admin/Product/addProduct.php"><button type="button" class="btn btn-success">Thêm</button></a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Giá</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Lượt xem</th>
        <th scope="col">Danh mục</th>
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($allProduct as $key => $item) { 
        // echo "<pre>";
        // print_r($item)?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $item['ten_san_pham'] ?></td>
          <td><?= $item['gia'] ?></td>
          <td><img src="image/<?= $item['anh'] ?>" width="70px"></td>
          <td><?= $item['mo_ta'] ?></td>
          <td><?= $item['luot_xem'] ?></td>
          <td><?= $item['ten_danh_muc'] ?></td>
          <td>
            <a href="Views/admin/Product/updateProduct.php?id=<?= $item['id']?>"><button type="button" class="btn btn-warning">Sửa</button></a>
            <a href="javascript:deleteConfirm('Views/admin/Product/deleteProduct.php?id=<?= $item['id'] ?>')"><button type="button" class="btn btn-danger">Xóa</button></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>