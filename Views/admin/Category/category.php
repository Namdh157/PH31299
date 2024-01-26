<div class="container mt-4" style="height: 80vh;">
    <a href="Views/admin/Category/addCategory.php"><button type="button" class="btn btn-success">Thêm</button></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allCategory as $key => $item) { ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $item['ten_danh_muc'] ?></td>
                    <td>
                        <a href="Views/admin/Category/updateCategory.php?id=<?= $item['id'] ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                        <a href="javascript:deleteConfirm('Views/admin/Category/deleteCategory.php?id=<?= $item['id'] ?>')"><button type="button" class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>