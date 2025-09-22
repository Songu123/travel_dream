<?php
// // Kiểm tra session admin
// function checkAdminLogin() {
//     if (session_status() == PHP_SESSION_NONE) {
//         session_start();
//     }
    
//     if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
//         header('Location: login.php');
//         exit();
//     }
// }

// // Lấy thông tin admin
// function getAdminInfo() {
//     return [
//         'id' => $_SESSION['admin_id'] ?? 1,
//         'username' => $_SESSION['admin_username'] ?? 'admin',
//         'name' => $_SESSION['admin_name'] ?? 'Administrator',
//         'email' => $_SESSION['admin_email'] ?? 'admin@traveldream.vn',
//         'avatar' => $_SESSION['admin_avatar'] ?? null
//     ];
// }

// // Logout function
// function adminLogout() {
//     session_start();
//     session_destroy();
//     header('Location: login.php');
//     exit();
// }

// // Database connection (Mock data for demo)
// function getDbConnection() {
//     // Trong thực tế, đây sẽ là kết nối database thật
//     // return new PDO('mysql:host=localhost;dbname=traveldream', $username, $password);
//     return null; // Mock connection
// }

// // Mock data functions
// function getMockUsers() {
//     return [
//         [
//             'id' => 1,
//             'name' => 'Nguyễn Văn An',
//             'email' => 'nguyenvanan@email.com',
//             'phone' => '0901234567',
//             'status' => 'active',
//             'join_date' => '2024-01-15',
//             'total_bookings' => 12,
//             'total_spent' => 45000000
//         ],
//         [
//             'id' => 2,
//             'name' => 'Trần Thị Bình',
//             'email' => 'tranthibinh@email.com',
//             'phone' => '0907654321',
//             'status' => 'active',
//             'join_date' => '2024-02-20',
//             'total_bookings' => 8,
//             'total_spent' => 32000000
//         ],
//         [
//             'id' => 3,
//             'name' => 'Lê Hoàng Nam',
//             'email' => 'lehoangnam@email.com',
//             'phone' => '0912345678',
//             'status' => 'inactive',
//             'join_date' => '2024-03-10',
//             'total_bookings' => 3,
//             'total_spent' => 12000000
//         ],
//         [
//             'id' => 4,
//             'name' => 'Phạm Thị Hoa',
//             'email' => 'phamthihoa@email.com',
//             'phone' => '0923456789',
//             'status' => 'active',
//             'join_date' => '2024-04-05',
//             'total_bookings' => 15,
//             'total_spent' => 58000000
//         ],
//         [
//             'id' => 5,
//             'name' => 'Võ Minh Tuấn',
//             'email' => 'vominhtuan@email.com',
//             'phone' => '0934567890',
//             'status' => 'active',
//             'join_date' => '2024-05-12',
//             'total_bookings' => 6,
//             'total_spent' => 24000000
//         ]
//     ];
// }

// function getMockTours() {
//     return [
//         [
//             'id' => 1,
//             'name' => 'Phú Quốc 3N2Đ - Đảo Ngọc Kiên Giang',
//             'destination' => 'Việt Nam',
//             'duration' => 3,
//             'price' => 2500000,
//             'status' => 'active',
//             'category' => 'domestic',
//             'total_bookings' => 156,
//             'rating' => 4.8,
//             'created_date' => '2024-01-01'
//         ],
//         [
//             'id' => 2,
//             'name' => 'Thái Lan 4N3Đ - Bangkok & Pattaya',
//             'destination' => 'Thái Lan',
//             'duration' => 4,
//             'price' => 7890000,
//             'status' => 'active',
//             'category' => 'international',
//             'total_bookings' => 234,
//             'rating' => 4.9,
//             'created_date' => '2024-01-15'
//         ],
//         [
//             'id' => 3,
//             'name' => 'Singapore 3N2Đ - Đảo Quốc Sư Tử',
//             'destination' => 'Singapore',
//             'duration' => 3,
//             'price' => 9500000,
//             'status' => 'active',
//             'category' => 'international',
//             'total_bookings' => 189,
//             'rating' => 4.7,
//             'created_date' => '2024-02-01'
//         ],
//         [
//             'id' => 4,
//             'name' => 'Nhật Bản 7N6Đ - Tokyo & Osaka',
//             'destination' => 'Nhật Bản',
//             'duration' => 7,
//             'price' => 18900000,
//             'status' => 'active',
//             'category' => 'international',
//             'total_bookings' => 98,
//             'rating' => 4.9,
//             'created_date' => '2024-02-15'
//         ],
//         [
//             'id' => 5,
//             'name' => 'Hàn Quốc 5N4Đ - Seoul & Busan',
//             'destination' => 'Hàn Quốc',
//             'duration' => 5,
//             'price' => 12500000,
//             'status' => 'inactive',
//             'category' => 'international',
//             'total_bookings' => 67,
//             'rating' => 4.6,
//             'created_date' => '2024-03-01'
//         ]
//     ];
// }

// function getMockBookings() {
//     return [
//         [
//             'id' => 1,
//             'user_name' => 'Nguyễn Văn An',
//             'tour_name' => 'Phú Quốc 3N2Đ - Đảo Ngọc Kiên Giang',
//             'booking_date' => '2024-09-15',
//             'travel_date' => '2024-10-20',
//             'adults' => 2,
//             'children' => 1,
//             'total_amount' => 6250000,
//             'status' => 'confirmed',
//             'payment_status' => 'paid'
//         ],
//         [
//             'id' => 2,
//             'user_name' => 'Trần Thị Bình',
//             'tour_name' => 'Thái Lan 4N3Đ - Bangkok & Pattaya',
//             'booking_date' => '2024-09-18',
//             'travel_date' => '2024-11-05',
//             'adults' => 4,
//             'children' => 0,
//             'total_amount' => 31560000,
//             'status' => 'pending',
//             'payment_status' => 'pending'
//         ],
//         [
//             'id' => 3,
//             'user_name' => 'Lê Hoàng Nam',
//             'tour_name' => 'Singapore 3N2Đ - Đảo Quốc Sư Tử',
//             'booking_date' => '2024-09-20',
//             'travel_date' => '2024-10-30',
//             'adults' => 2,
//             'children' => 2,
//             'total_amount' => 28500000,
//             'status' => 'confirmed',
//             'payment_status' => 'partial'
//         ],
//         [
//             'id' => 4,
//             'user_name' => 'Phạm Thị Hoa',
//             'tour_name' => 'Nhật Bản 7N6Đ - Tokyo & Osaka',
//             'booking_date' => '2024-09-22',
//             'travel_date' => '2024-12-15',
//             'adults' => 2,
//             'children' => 0,
//             'total_amount' => 37800000,
//             'status' => 'confirmed',
//             'payment_status' => 'paid'
//         ],
//         [
//             'id' => 5,
//             'user_name' => 'Võ Minh Tuấn',
//             'tour_name' => 'Hàn Quốc 5N4Đ - Seoul & Busan',
//             'booking_date' => '2024-09-19',
//             'travel_date' => '2024-11-12',
//             'adults' => 3,
//             'children' => 1,
//             'total_amount' => 43750000,
//             'status' => 'cancelled',
//             'payment_status' => 'refunded'
//         ]
//     ];
// }

// function getMockPayments() {
//     return [
//         [
//             'id' => 1,
//             'booking_id' => 1,
//             'user_name' => 'Nguyễn Văn An',
//             'amount' => 6250000,
//             'payment_method' => 'bank_transfer',
//             'payment_date' => '2024-09-16',
//             'status' => 'completed',
//             'transaction_id' => 'TXN001234567'
//         ],
//         [
//             'id' => 2,
//             'booking_id' => 2,
//             'user_name' => 'Trần Thị Bình',
//             'amount' => 31560000,
//             'payment_method' => 'credit_card',
//             'payment_date' => null,
//             'status' => 'pending',
//             'transaction_id' => null
//         ],
//         [
//             'id' => 3,
//             'booking_id' => 3,
//             'user_name' => 'Lê Hoàng Nam',
//             'amount' => 14250000,
//             'payment_method' => 'bank_transfer',
//             'payment_date' => '2024-09-21',
//             'status' => 'completed',
//             'transaction_id' => 'TXN001234568'
//         ],
//         [
//             'id' => 4,
//             'booking_id' => 4,
//             'user_name' => 'Phạm Thị Hoa',
//             'amount' => 37800000,
//             'payment_method' => 'momo',
//             'payment_date' => '2024-09-22',
//             'status' => 'completed',
//             'transaction_id' => 'TXN001234569'
//         ],
//         [
//             'id' => 5,
//             'booking_id' => 5,
//             'user_name' => 'Võ Minh Tuấn',
//             'amount' => -43750000,
//             'payment_method' => 'refund',
//             'payment_date' => '2024-09-20',
//             'status' => 'refunded',
//             'transaction_id' => 'REF001234567'
//         ]
//     ];
// }

// function getMockReviews() {
//     return [
//         [
//             'id' => 1,
//             'user_name' => 'Nguyễn Văn An',
//             'tour_name' => 'Phú Quốc 3N2Đ - Đảo Ngọc Kiên Giang',
//             'rating' => 5,
//             'comment' => 'Tour rất tuyệt vời! Hướng dẫn viên nhiệt tình, lịch trình hợp lý. Sẽ đi tour với TravelDream lần nữa.',
//             'review_date' => '2024-09-25',
//             'status' => 'approved'
//         ],
//         [
//             'id' => 2,
//             'user_name' => 'Phạm Thị Hoa',
//             'tour_name' => 'Nhật Bản 7N6Đ - Tokyo & Osaka',
//             'rating' => 4,
//             'comment' => 'Chuyến đi Nhật Bản rất đáng nhớ. Tuy nhiên thời gian tại Tokyo hơi ngắn. Nhìn chung rất hài lòng.',
//             'review_date' => '2024-09-22',
//             'status' => 'approved'
//         ],
//         [
//             'id' => 3,
//             'user_name' => 'Lê Hoàng Nam',
//             'tour_name' => 'Singapore 3N2Đ - Đảo Quốc Sư Tử',
//             'rating' => 3,
//             'comment' => 'Tour ổn nhưng khách sạn không như mong đợi. Hy vọng công ty cải thiện chất lượng khách sạn.',
//             'review_date' => '2024-09-20',
//             'status' => 'pending'
//         ],
//         [
//             'id' => 4,
//             'user_name' => 'Trần Thị Bình',
//             'tour_name' => 'Thái Lan 4N3Đ - Bangkok & Pattaya',
//             'rating' => 5,
//             'comment' => 'Excellent service! Everything was perfect from start to finish. Highly recommended!',
//             'review_date' => '2024-09-18',
//             'status' => 'approved'
//         ],
//         [
//             'id' => 5,
//             'user_name' => 'Võ Minh Tuấn',
//             'tour_name' => 'Hàn Quốc 5N4Đ - Seoul & Busan',
//             'rating' => 2,
//             'comment' => 'Tour bị hủy vào phút chót do lý do không rõ ràng. Rất thất vọng về dịch vụ.',
//             'review_date' => '2024-09-19',
//             'status' => 'rejected'
//         ]
//     ];
// }

// // Format currency
// function formatCurrency($amount) {
//     return number_format($amount, 0, ',', '.') . '₫';
// }

// // Format date
// function formatDate($date) {
//     return date('d/m/Y', strtotime($date));
// }

// // Format datetime
// function formatDateTime($datetime) {
//     return date('d/m/Y H:i', strtotime($datetime));
// }

// // Get status badge HTML
// function getStatusBadge($status) {
//     $badges = [
//         'active' => 'status-badge active',
//         'inactive' => 'status-badge inactive',
//         'pending' => 'status-badge pending',
//         'confirmed' => 'status-badge confirmed',
//         'cancelled' => 'status-badge inactive',
//         'paid' => 'status-badge active',
//         'partial' => 'status-badge pending',
//         'refunded' => 'status-badge inactive',
//         'completed' => 'status-badge active',
//         'approved' => 'status-badge active',
//         'rejected' => 'status-badge inactive'
//     ];
    
//     $class = $badges[$status] ?? 'status-badge';
//     $text = ucfirst($status);
    
//     // Vietnamese translations
//     $translations = [
//         'active' => 'Hoạt động',
//         'inactive' => 'Không hoạt động',
//         'pending' => 'Chờ xử lý',
//         'confirmed' => 'Đã xác nhận',
//         'cancelled' => 'Đã hủy',
//         'paid' => 'Đã thanh toán',
//         'partial' => 'Thanh toán một phần',
//         'refunded' => 'Đã hoàn tiền',
//         'completed' => 'Hoàn thành',
//         'approved' => 'Đã duyệt',
//         'rejected' => 'Từ chối'
//     ];
    
//     $text = $translations[$status] ?? $text;
    
//     return "<span class=\"{$class}\">{$text}</span>";
// }

session_start();

// Kết nối database
function connectDB() {
    $host = '127.0.0.1';
    $dbname = 'du_lich';
    $username = 'root';
    $password = ''; // Để trống nếu không có mật khẩu

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Lỗi kết nối database: " . $e->getMessage());
    }
}

// Kiểm tra đăng nhập admin
function checkAdminLogin() {
    if (!isset($_SESSION['admin_id'])) {
        header('Location: login.php');
        exit;
    }
}

// Lấy thông tin admin
function getAdminInfo() {
    $pdo = connectDB();
    $adminId = $_SESSION['admin_id'];
    $stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE id = ? AND role = 'admin'");
    $stmt->execute([$adminId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Lấy danh sách người dùng
function getUsers() {
    $pdo = connectDB();
    $stmt = $pdo->query("
        SELECT u.id, u.name, u.email, u.phone, u.created_at AS join_date, 
               COUNT(b.id) AS total_bookings, 
               COALESCE(SUM(b.total_price), 0) AS total_spent,
               CASE WHEN u.role = 'user' THEN 'active' ELSE 'inactive' END AS status
        FROM users u
        LEFT JOIN bookings b ON u.id = b.user_id
        GROUP BY u.id
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Định dạng ngày
function formatDate($date) {
    return date('d/m/Y', strtotime($date));
}

// Định dạng tiền tệ
function formatCurrency($amount) {
    return number_format($amount, 0, ',', '.') . '₫';
}

// Lấy badge trạng thái
function getStatusBadge($status) {
    if ($status == 'active') {
        return '<span class="badge bg-success">Hoạt động</span>';
    }
    return '<span class="badge bg-secondary">Không hoạt động</span>';
}

// Đăng xuất admin
function adminLogout() {
    session_destroy();
    header('Location: login.php');
    exit;
}

// Xử lý thêm người dùng
function addUser($name, $email, $phone, $password, $status) {
    $pdo = connectDB();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password, role, created_at) VALUES (?, ?, ?, ?, 'user', NOW())");
    try {
        $stmt->execute([$name, $email, $phone, $hashedPassword]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Xử lý chỉnh sửa người dùng
function editUser($userId, $name, $email, $phone, $status) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, phone = ?, role = ? WHERE id = ?");
    try {
        $role = ($status == 'active') ? 'user' : 'admin'; // Giả sử role admin là inactive
        $stmt->execute([$name, $email, $phone, $role, $userId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Xử lý xóa người dùng
function deleteUser($userId) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    try {
        $stmt->execute([$userId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Xử lý kích hoạt/vô hiệu hóa người dùng
function toggleUserStatus($userId, $action) {
    $pdo = connectDB();
    $status = ($action == 'activate') ? 'active' : 'inactive';
    $stmt = $pdo->prepare("UPDATE users SET status = ? WHERE id = ?");
    try {
        $stmt->execute([$status, $userId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// ===== TOUR MANAGEMENT FUNCTIONS =====

// Lấy danh sách tours
function getTours() {
    $pdo = connectDB();
    $stmt = $pdo->query("
        SELECT t.*, 
               COUNT(b.id) AS total_bookings,
               AVG(r.rating) AS rating
        FROM tours t
        LEFT JOIN bookings b ON t.id = b.tour_id
        LEFT JOIN reviews r ON t.id = r.tour_id
        GROUP BY t.id
        ORDER BY t.id DESC
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Thêm tour mới
function addTour($name, $destination, $duration, $price, $description, $category, $max_participants, $image_url) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("
        INSERT INTO tours (name, destination, duration, price, description, category, max_participants, image_url, status, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'active', NOW())
    ");
    try {
        $stmt->execute([$name, $destination, $duration, $price, $description, $category, $max_participants, $image_url]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Chỉnh sửa tour
function editTour($tourId, $name, $destination, $duration, $price, $description, $category, $max_participants, $image_url) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("
        UPDATE tours 
        SET name = ?, destination = ?, duration = ?, price = ?, description = ?, 
            category = ?, max_participants = ?, image_url = ?, updated_at = NOW()
        WHERE id = ?
    ");
    try {
        $stmt->execute([$name, $destination, $duration, $price, $description, $category, $max_participants, $image_url, $tourId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Xóa tour
function deleteTour($tourId) {
    $pdo = connectDB();
    // Kiểm tra xem có booking nào không
    $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM bookings WHERE tour_id = ?");
    $checkStmt->execute([$tourId]);
    $bookingCount = $checkStmt->fetchColumn();
    
    if ($bookingCount > 0) {
        // Chỉ vô hiệu hóa thay vì xóa nếu có booking
        return toggleTourStatus($tourId, 'deactivate');
    }
    
    $stmt = $pdo->prepare("DELETE FROM tours WHERE id = ?");
    try {
        $stmt->execute([$tourId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Kích hoạt/vô hiệu hóa tour
function toggleTourStatus($tourId, $action) {
    $pdo = connectDB();
    $status = ($action == 'activate') ? 'active' : 'inactive';
    $stmt = $pdo->prepare("UPDATE tours SET status = ?, updated_at = NOW() WHERE id = ?");
    try {
        $stmt->execute([$status, $tourId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Lấy badge trạng thái tour
function getTourStatusBadge($status) {
    if ($status == 'active') {
        return '<span class="badge bg-success">Hoạt động</span>';
    }
    return '<span class="badge bg-secondary">Không hoạt động</span>';
}

// Lấy tổng số booking
function getTotalBookings() {
    $pdo = connectDB();
    $stmt = $pdo->query("SELECT COUNT(*) FROM bookings");
    return $stmt->fetchColumn();
}

// Lấy tổng doanh thu
function getTotalRevenue() {
    $pdo = connectDB();
    $stmt = $pdo->query("
        SELECT COALESCE(SUM(total_price), 0) 
        FROM bookings 
        WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) 
        AND YEAR(created_at) = YEAR(CURRENT_DATE())
        AND status = 'confirmed'
    ");
    return $stmt->fetchColumn();
}
?>
