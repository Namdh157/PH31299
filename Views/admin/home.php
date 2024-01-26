<?php 
require_once 'Models/pdo.php';
require_once 'Models/productModel.php';
$label = [];
$data=[];
$chart = pdo_query("SELECT danh_muc.ten_danh_muc,COUNT(san_pham.id_danh_muc) AS count FROM san_pham JOIN danh_muc ON san_pham.id_danh_muc = danh_muc.id GROUP BY san_pham.id_danh_muc");
foreach ($chart as $collum){
  array_push($label,$collum['ten_danh_muc']);
  array_push($data,$collum['count']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">
        <canvas id="myChart"></canvas>
    </div>
</body>
<script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($label, JSON_UNESCAPED_UNICODE) ?>,
            datasets: [{
                label: 'Số lượng sản phẩm theo danh mục',
                data: <?php echo json_encode($data, JSON_UNESCAPED_UNICODE) ?>,
                borderWidth: 1,
                backgroundColor: ['Red', 'Yellow', 'Orange', 'Black']
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>