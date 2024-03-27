<?php
// Kết nối đến cơ sở dữ liệu
$connection = mysqli_connect('localhost', 'root', '', 'kiemtra');

// Kiểm tra kết nối
if (!$connection) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Lấy mã nhân viên từ tham số truyền vào
$ma_nv = $_GET['id'];

// Thực hiện truy vấn để xoá nhân viên khỏi cơ sở dữ liệu
$query = "DELETE FROM NHANVIEN WHERE Ma_NV = '$ma_nv'";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Xoá nhân viên thành công.";
} else {
    echo "Lỗi khi xoá nhân viên: " . mysqli_error($connection);
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($connection);
?>