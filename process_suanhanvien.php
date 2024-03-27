<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thông báo cập nhật nhân viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .success {
            color: #008000;
        }
        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <?php
        // Kết nối đến cơ sở dữ liệu
        $connection = mysqli_connect('localhost', 'root', '', 'kiemtra');

        // Kiểm tra kết nối
        if (!$connection) {
            die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }

        // Lấy dữ liệu từ biểu mẫu sửa nhân viên
        $ma_nv = $_POST['ma_nv'];
        $ten_nv = $_POST['ten_nv'];
        $phai = $_POST['phai'];
        $noi_sinh = $_POST['noi_sinh'];
        $ma_phong = $_POST['ma_phong'];
        $luong = $_POST['luong'];

        // Thực hiện truy vấn để cập nhật thông tin nhân viên trong cơ sở dữ liệu
        $query = "UPDATE NHANVIEN SET Ten_NV = '$ten_nv', Phai = '$phai', Noi_Sinh = '$noi_sinh', Ma_Phong = '$ma_phong', Luong = '$luong' WHERE Ma_NV = '$ma_nv'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // URL ảnh GIF chúc mừng từ internet
            $gifUrl = "https://media1.giphy.com/media/5nj4ZZWl6ZyvK/giphy.gif";
            echo "<img src='$gifUrl' alt='Chúc mừng'><br>";
            echo "<p class='success'>Cập nhật nhân viên thành công.</p>";
        } else {
            echo "<p class='error'>Lỗi khi cập nhật nhân viên: " . mysqli_error($connection) . "</p>";
        }

        // Đóng kết nối cơ sở dữ liệu
        mysqli_close($connection);
        ?>
    </div>
</body>
</html>
