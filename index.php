<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hiển thị dữ liệu NHANVIEN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .container h1 {
            text-align: center;
            padding: 20px 0;
            margin: 0;
            background-color: black;
            color: #fff;
            border-bottom: 2px solid #0056b3;
        }
        .add-button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: black;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .add-button:hover {
            background-color: #0056b3;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .thumbnail {
            width: 50px;
            border-radius: 50%;
        }
        .action-links a {
            color: black;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .action-links a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dữ liệu NHANVIEN</h1>

        <?php
        // Kiểm tra vai trò của người dùng
        session_start();
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            echo '<a href="them_nhanvien.php" class="add-button">Thêm nhân viên</a>';
        }
        ?>

        <?php
        // Kết nối đến cơ sở dữ liệu
        $connection = mysqli_connect('localhost', 'root', '', 'kiemtra');

        // Kiểm tra kết nối
        if (!$connection) {
            die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }

        // Xác định trang hiện tại
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Số lượng nhân viên trên mỗi trang
        $limit = 5;

        // Tính toán vị trí bắt đầu của các nhân viên trên trang hiện tại
        $start = ($page - 1) * $limit;

        // Truy vấn dữ liệu từ bảng NHANVIEN với giới hạn trang và vị trí bắt đầu
        $query = "SELECT Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong FROM NHANVIEN LIMIT $start, $limit";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($connection));
        }
        ?>

        <table>
            <tr>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Phái</th>
                <th>Nơi Sinh</th>
                <th>Mã Phòng</th>
                <th>Lương</th>
                <th>Thao tác</th>
            </tr>
            <?php
            // Duyệt qua các hàng dữ liệu và hiển thị
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Ma_NV'] . "</td>";
                echo "<td>" . $row['Ten_NV'] . "</td>";
                echo "<td><img class='thumbnail' src='/kiemtra/images/" . ($row['Phai'] == 'NU' ? 'woman.jpg' : 'man.jpg') . "' alt='Hình ảnh'></td>";
                echo "<td>" . $row['Noi_Sinh'] . "</td>";
                echo "<td>" . $row['Ma_Phong'] . "</td>";
                echo "<td>" . $row['Luong'] . "</td>";

                // Hiển thị các nút Sửa và Xoá nếu là vai trò admin
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                    echo "<td class='action-links'><a href='sua_nhanvien.php?id=" . $row['Ma_NV'] . "'>Sửa</a> | <a href='xoa_nhanvien.php?id=" . $row['Ma_NV'] . "'>Xoá</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

        <?php
        // Truy vấn tổng số lượng nhân viên
        $totalQuery = "SELECT COUNT(*) AS total FROM NHANVIEN";
        $totalResult = mysqli_query($connection, $totalQuery);
        $totalRow = mysqli_fetch_assoc($totalResult);
        $totalEmployees = $totalRow['total'];

        // Tính toán số lượng trang
        $totalPages = ceil($totalEmployees / $limit);

        // Hiển thị các liên kết phân trang
        echo "<div style='text-align: center; margin-top: 20px;'>";
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='index.php?page=$i'>$i</a> ";
        }
        echo "</div>";
        ?>
    </div>
</body>
</html>

<?php
// Đóng kết nối cơ s
