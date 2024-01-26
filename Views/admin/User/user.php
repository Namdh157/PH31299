<?php
require_once 'Models/userModel.php';
?>
<div class="container mt-4" style="height: 80vh;">
  <a href="Views/admin/User/addUser.php"><button type="button" class="btn btn-success">Thêm</button></a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên tài khoản</th>
        <th scope="col">Mật khẩu</th>
        <th scope="col">Họ và tên</th>
        <th scope="col">Email</th>
        <th scope="col">Ảnh đại diện</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Chức vụ</th>
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($allUser as $key => $item) { ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $item['ten_tai_khoan'] ?></td>
          <td><?= $item['mat_khau'] ?></td>
          <td><?= $item['ho_ten'] ?></td>
          <td><?= $item['email'] ?></td>
          <td><img src="image/<?= $item['anh_dai_dien'] ?>" width="70px"></td>
          <td><?= $item['dia_chi'] ?></td>
          <td><?= $item['sdt'] ?></td>
          <td>
            <?php
            if ($item['chuc_vu'] == 1) {
              echo 'Khách hàng';
            } else if ($item['chuc_vu'] == 2) {
              echo 'Admin';
            }
            ?>
          </td>
          <td>
            <a href="Views/admin/User/updateUser.php?id=<?= $item['id'] ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
            <a href="javascript:deleteConfirm('Views/admin/User/deleteUser.php?id=<?= $item['id'] ?>')"><button type="button" class="btn btn-danger">Xóa</button></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>