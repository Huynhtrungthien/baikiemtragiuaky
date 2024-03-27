<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$connection = mysqli_connect('localhost', 'root', '', 'user');

// Kiểm tra kết nối
if (!$connection) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sử dụng câu lệnh prepared statement để tránh SQL injection
    $query = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $query);

    // Kiểm tra lỗi prepare statement
    if ($stmt === false) {
        die("Lỗi truy vấn: " . mysqli_error($connection));
    }

    // Bind các biến vào câu lệnh
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Thực thi câu lệnh
    mysqli_stmt_execute($stmt);

    // Lấy kết quả
    $result = mysqli_stmt_get_result($stmt);

    // Kiểm tra số lượng hàng trả về
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];

        // Lưu thông tin người dùng vào session
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Chuyển hướng đến trang chính sau khi đăng nhập thành công
        header("Location: index.php");
        exit;
    } else {
        // Sai thông tin đăng nhập, hiển thị thông báo lỗi
        $error = "Tên đăng nhập hoặc mật khẩu không chính xác.";
    }

    // Đóng câu lệnh
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kết quả đăng nhập</title>
</head>
<body>
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
