<?php
// Thông tin kết nối database
$host = "localhost";    // Tên server MySQL (thường là localhost)
$user = "root";         // Tài khoản MySQL (XAMPP mặc định là root)
$pass = "";             // Mật khẩu (XAMPP mặc định để rỗng)
$dbname = "du_lich";    // Tên database bạn đã tạo

// Kết nối
$conn = new mysqli($host, $user, $pass, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nếu thành công
echo "Kết nối thành công!";
?>
