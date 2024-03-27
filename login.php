<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/hoadao.jpg'); /* Đường dẫn tới hình ảnh hoa đào */
            background-size: cover;
            background-position: center;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Nền trong suốt */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
            padding: 20px;
            text-align: center;
        }
        h2 {
            margin-top: 0;
            color: #fff;
            background-color: #ff0000; /* Màu đỏ */
            padding: 10px 0;
            border-radius: 5px 5px 0 0;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #ff0000; /* Màu đỏ */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #990000; /* Màu đỏ nhạt khi hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <form method="POST" action="login_process.php">
            <label for="username">Tên đăng nhập:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="password">Mật khẩu:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="Đăng nhập">
        </form>
    </div>
</body>
</html>
