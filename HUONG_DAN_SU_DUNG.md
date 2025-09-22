# Hướng Dẫn Cài Đặt và Sử Dụng Hệ Thống Quản Lý Tour

## 📋 Yêu Cầu Hệ Thống

- **XAMPP** hoặc **WAMP/LAMP** server
- **PHP 7.4+**
- **MySQL 5.7+**
- **Web Browser** (Chrome, Firefox, Safari, Edge)

## 🚀 Cài Đặt

### 1. Thiết Lập Database

1. Mở **phpMyAdmin** tại `http://localhost/phpmyadmin`
2. Tạo database mới tên `du_lich`
3. Import file SQL: `admin/database.sql`

**Hoặc chạy lệnh SQL:**
```sql
-- Copy toàn bộ nội dung từ file admin/database.sql và chạy
```

### 2. Cấu Hình Kết Nối Database

Kiểm tra file `admin/includes/functions.php` - dòng 196:
```php
function connectDB() {
    $host = '127.0.0.1';
    $dbname = 'du_lich';
    $username = 'root';
    $password = ''; // Điều chỉnh nếu có mật khẩu MySQL
}
```

### 3. Khởi Động Server

1. Bật **XAMPP Control Panel**
2. Start **Apache** và **MySQL**
3. Truy cập: `http://localhost/hoc_PHP/travel_website/`

## 🔐 Đăng Nhập Admin

- **URL:** `http://localhost/hoc_PHP/travel_website/admin/login.php`
- **Email:** `admin@traveldream.vn`
- **Password:** `password` (hash mặc định)

## 📁 Cấu Trúc File

```
travel_website/
├── admin/                      # Quản trị hệ thống
│   ├── css/admin.css          # CSS cho admin
│   ├── includes/functions.php  # Các hàm xử lý
│   ├── dashboard.php          # Trang chủ admin
│   ├── users.php              # Quản lý người dùng
│   ├── tours.php              # Quản lý tour ⭐
│   ├── login.php              # Đăng nhập admin
│   ├── logout.php             # Đăng xuất
│   └── database.sql           # Cấu trúc database
├── pages/                     # Trang người dùng
│   ├── tours.html             # Danh sách tour
│   ├── tour-detail.html       # Chi tiết tour
│   ├── booking.html           # Đặt tour ⭐
│   ├── about.html             # Giới thiệu
│   └── contact.html           # Liên hệ
├── css/style.css              # CSS chính
├── js/script.js               # JavaScript chính
├── images/                    # Thư mục ảnh
└── index.html                 # Trang chủ
```

## ✨ Tính Năng Quản Lý Tour

### 📊 Dashboard Tour
- **Thống kê tổng quan:** Tổng tour, tour hoạt động, booking, doanh thu
- **Biểu đồ:** Theo dõi xu hướng đặt tour và doanh thu
- **Hoạt động gần đây:** Theo dõi các hoạt động mới nhất

### 📝 CRUD Tour Operations

#### ➕ **Thêm Tour Mới**
1. Click **"Thêm Tour Mới"**
2. Điền thông tin:
   - Tên tour (bắt buộc)
   - Điểm đến (bắt buộc)
   - Thời gian (ngày)
   - Giá tour (VNĐ)
   - Danh mục: Trong nước/Nước ngoài
   - Số người tối đa
   - URL ảnh
   - Mô tả chi tiết
3. Click **"Lưu Tour"**

#### ✏️ **Chỉnh Sửa Tour**
1. Click icon **✏️** trong cột "Thao tác"
2. Cập nhật thông tin cần thiết
3. Click **"Cập Nhật"**

#### 👁️ **Xem Chi Tiết Tour**
1. Click icon **👁️** để xem đầy đủ thông tin tour
2. Hiển thị: Ảnh, mô tả, thống kê booking, rating

#### ⏸️/▶️ **Kích Hoạt/Vô Hiệu Hóa**
1. Click icon **⏸️** (tạm dừng) hoặc **▶️** (kích hoạt)
2. Xác nhận trong popup

#### 🗑️ **Xóa Tour**
1. Click icon **🗑️**
2. Xác nhận xóa trong popup
3. **Lưu ý:** Tour có booking sẽ được vô hiệu hóa thay vì xóa

### 🔍 Tìm Kiếm và Lọc
- **Tìm kiếm:** Theo tên tour, điểm đến
- **Lọc trạng thái:** Tất cả, Hoạt động, Không hoạt động
- **Sắp xếp:** Theo các cột (ID, tên, giá, rating...)
- **Phân trang:** 10 tour/trang (có thể điều chỉnh)

### 📱 Responsive Design
- **Desktop:** Hiển thị đầy đủ tính năng
- **Tablet:** Layout 2 cột, menu thu gọn
- **Mobile:** Layout 1 cột, action buttons dạng stack

## 🌐 Tính Năng Booking Tour (Frontend)

### 📋 Quy Trình Đặt Tour

1. **Duyệt Tours:** `pages/tours.html`
   - Xem danh sách tour
   - Tìm kiếm, lọc theo tiêu chí
   - Click "Chi tiết" để xem thêm

2. **Chi Tiết Tour:** `pages/tour-detail.html`
   - Gallery ảnh với lightbox
   - Thông tin chi tiết tour
   - Lịch trình từng ngày
   - Đánh giá khách hàng
   - **Sidebar đặt tour:**
     - Chọn ngày khởi hành
     - Số lượng khách (Người lớn/Trẻ em/Em bé)
     - Tính giá tự động
     - Click "Đặt Tour Ngay"

3. **Trang Đặt Tour:** `pages/booking.html`
   - **Progress bar:** 4 bước tiến trình
   - **Thông tin tour:** Tổng kết lựa chọn
   - **Form khách hàng:**
     - Thông tin liên hệ
     - Chi tiết từng khách tham gia
   - **Tóm tắt giá:**
     - Breakdown theo loại khách
     - VAT 10%
     - Tổng cộng
   - **Phương thức thanh toán:**
     - Chuyển khoản ngân hàng
     - Thẻ tín dụng
     - Ví MoMo
     - Tại văn phòng
   - **Điều khoản:** Chính sách hủy/đổi tour

4. **Hoàn Tất:** Popup thông báo thành công + mã đặt tour

### 💰 Bảng Giá
- **Người lớn:** 100% giá gốc
- **Trẻ em (2-12 tuổi):** 75% giá gốc
- **Em bé (<2 tuổi):** 20% giá gốc
- **VAT:** 10% tổng giá

## 🔧 Cấu Hình Nâng Cao

### 📧 Email Configuration
Trong `functions.php`, thêm cấu hình SMTP:
```php
// Email settings
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your_email@gmail.com');
define('SMTP_PASSWORD', 'your_app_password');
```

### 💳 Payment Gateway
Tích hợp cổng thanh toán:
- **VNPay**
- **MoMo**
- **ZaloPay**
- **OnePay**

### 📱 SMS Notification
Cấu hình gửi SMS xác nhận:
```php
// SMS API configuration
define('SMS_API_KEY', 'your_sms_api_key');
define('SMS_BRAND_NAME', 'TravelDream');
```

## 🛠️ Troubleshooting

### ❌ Lỗi Kết Nối Database
```
Error: SQLSTATE[HY000] [1045] Access denied
```
**Giải pháp:**
1. Kiểm tra username/password MySQL trong `functions.php`
2. Đảm bảo MySQL service đang chạy
3. Tạo user MySQL mới nếu cần:
```sql
CREATE USER 'travel_user'@'localhost' IDENTIFIED BY 'travel_pass';
GRANT ALL PRIVILEGES ON du_lich.* TO 'travel_user'@'localhost';
FLUSH PRIVILEGES;
```

### ❌ Lỗi "Headers already sent"
**Nguyên nhân:** Output trước khi redirect
**Giải pháp:** Đảm bảo không có echo/HTML trước `header()` functions

### ❌ JavaScript Errors
**Kiểm tra:**
1. Internet connection (cho CDN libraries)
2. Browser console (F12)
3. File paths đúng

### ❌ CSS Không Load
**Kiểm tra:**
1. Đường dẫn file CSS
2. Permissions của thư mục
3. Cache browser (Ctrl+F5)

## 📞 Hỗ Trợ

### 🐛 Bug Reports
Báo cáo lỗi với thông tin:
- URL trang lỗi
- Thông báo lỗi (nếu có)
- Browser và version
- Screenshots

### 💡 Feature Requests
Đề xuất tính năng mới:
- Mô tả chi tiết tính năng
- Use case cụ thể
- Mockup/wireframe (nếu có)

## 📈 Roadmap

### Phase 2 (Coming Soon)
- [ ] **Multi-language Support**
- [ ] **Advanced Analytics Dashboard**
- [ ] **Mobile App API**
- [ ] **Social Media Integration**
- [ ] **Advanced Search with Filters**
- [ ] **Tour Recommendation Engine**

### Phase 3 (Future)
- [ ] **AI-powered Customer Support**
- [ ] **Virtual Tour Preview**
- [ ] **Loyalty Points System**
- [ ] **Group Booking Management**
- [ ] **Real-time Chat Support**

## 🏆 Best Practices

### 🔒 Security
- Sử dụng prepared statements
- Validate input data
- Escape output
- Regular security updates

### 📊 Performance
- Optimize database queries
- Use caching where appropriate
- Compress images
- Minify CSS/JS for production

### 🧪 Testing
- Test trên multiple browsers
- Test responsive design
- Test form validation
- Test booking flow end-to-end

---

## 🎉 Chúc Mừng!

Bạn đã cài đặt thành công **TravelDream Admin System**! 

🌟 **Happy Coding & Safe Travels!** 🌟