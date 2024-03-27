<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sửa nhân viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2 {
            text-align: center;
            margin-top: 0;
            color: #ffffff; /* Màu trắng cho tiêu đề */
            background-color: #007bff; /* Phủ xanh */
            padding: 10px 0;
            border-radius: 10px 10px 0 0;
        }
        form {
            display: grid;
            grid-gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Kết nối đến cơ sở dữ liệu
        $connection = mysqli_connect('localhost', 'root', '', 'kiemtra');

        // Kiểm tra kết nối 
        if (!$connection) {
            die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }

        // Lấy mã nhân viên từ tham số truyền vào
        $ma_nv = $_GET['id'];

        // Thực hiện truy vấn để lấy thông tin nhân viên từ cơ sở dữ liệu
        $query = "SELECT * FROM NHANVIEN WHERE Ma_NV = '$ma_nv'";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>

            <h2>Sửa thông tin nhân viên</h2>
            <form method="POST" action="process_suanhanvien.php">
                <input type="hidden" name="ma_nv" value="<?php echo $row['Ma_NV']; ?>">

                <label for="ten_nv">Tên nhân viên:</label>
                <input type="text" id="ten_nv" name="ten_nv" value="<?php echo $row['Ten_NV']; ?>" required><br>

                <label for="phai">Phái:</label>
                <select id="phai" name="phai">
                    <option value="NU" <?php if ($row['Phai'] == 'NU') echo 'selected'; ?>>Nữ</option>
                    <option value="NAM" <?php if ($row['Phai'] == 'NAM') echo 'selected'; ?>>Nam</option>
                </select><br>

                <label for="noi_sinh">Nơi sinh:</label>
                <input type="text" id="noi_sinh" name="noi_sinh" value="<?php echo $row['Noi_Sinh']; ?>" required><br>

                <label for="ma_phong">Mã phòng:</label>
                <input type="text" id="ma_phong" name="ma_phong" value="<?php echo $row['Ma_Phong']; ?>" required><br>

                <label for="luong">Lương:</label>
                <input type="text" id="luong" name="luong" value="<?php echo $row['Luong']; ?>" required><br>

                <input type="submit" value="Lưu">
            </form>

            <?php
        } else {
            echo "<h2>Không tìm thấy nhân viên.</h2>";
        }

        // Đóng kết nối cơ sở dữ liệu
        mysqli_close($connection);
        ?>
    </div>
</body>
</html>
