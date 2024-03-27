<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm nhân viên</title>
    <style>
        body {
            background-color: #f0f0f0; /* Màu nền xám nhạt */
            color: #333; /* Màu chữ đậm */
            font-family: Arial, sans-serif; /* Font chữ thường được sử dụng */
        }

        .container {
            background-color: #fff; /* Màu nền trắng cho khung chứa nội dung */
            border-radius: 8px; /* Bo tròn các góc */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
            padding: 20px; /* Khoảng cách lề nội dung */
            max-width: 400px; /* Độ rộng tối đa */
            margin: 0 auto; /* Canh giữa */
        }

        h1 {
            text-align: center;
            color: #007bff; /* Màu chữ xanh dương */
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold; /* Chữ đậm cho nhãn */
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff; /* Màu nền xanh dương cho nút */
            color: #fff; /* Màu chữ trắng */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #0056b3; /* Màu nền xanh dương nhạt khi hover */
        }

        .back-button {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff; /* Màu chữ xanh dương */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .back-button:hover {
            color: #0056b3; /* Màu chữ xanh dương nhạt khi hover */
        }

        .success {
            color: #28a745; /* Màu chữ xanh lá cây */
        }

        .error {
            color: #dc3545; /* Màu chữ đỏ */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thêm nhân viên</h1>

        <?php
        // PHP code xử lý thêm nhân viên
        ?>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="maNV">Mã Nhân Viên:</label>
                <input type="text" name="maNV" id="maNV" required>
            </div>
            <div class="form-group">
                <label for="tenNV">Tên Nhân Viên:</label>
                <input type="text" name="tenNV" id="tenNV" required>
            </div>
            <div class="form-group">
                <label for="phai">Phái:</label>
                <select name="phai" id="phai" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="noiSinh">Nơi Sinh:</label>
                <input type="text" name="noiSinh" id="noiSinh" required>
            </div>
            <div class="form-group">
                <label for="maPhong">Mã Phòng:</label>
                <input type="text" name="maPhong" id="maPhong" required>
            </div>
            <div class="form-group">
                <label for="luong">Lương:</label>
                <input type="text" name="luong" id="luong" required>
            </div>
            <input type="submit" value="Thêm" class="submit-button">
        </form>

        <a href="index.php" class="back-button">Quay lại</a>
    </div>
</body>
</html>
