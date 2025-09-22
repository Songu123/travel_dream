<?php
require_once '../config/db.php';

$sql = "SELECT * FROM tours";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours & Packages - TravelDream</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <!-- Navigation -->
    <?php include '../inc/navbar.php'; ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
            <div class="page-header-overlay"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title" data-aos="fade-up">Tours & Packages</h1>
                    <p class="page-subtitle" data-aos="fade-up" data-aos-delay="100">Khám phá những gói tour tuyệt vời được thiết kế đặc biệt cho bạn</p>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="../index.html">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Tours</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-filter-bar">
                        <div class="row g-3 align-items-end">
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Điểm đến</label>
                                <select class="form-select" id="destinationFilter">
                                    <option value="">Tất cả điểm đến</option>
                                    <option value="vietnam">Việt Nam</option>
                                    <option value="thailand">Thái Lan</option>
                                    <option value="singapore">Singapore</option>
                                    <option value="japan">Nhật Bản</option>
                                    <option value="korea">Hàn Quốc</option>
                                    <option value="europe">Châu Âu</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label class="form-label">Thời gian</label>
                                <select class="form-select" id="durationFilter">
                                    <option value="">Tất cả</option>
                                    <option value="1-3">1-3 ngày</option>
                                    <option value="4-7">4-7 ngày</option>
                                    <option value="8-14">8-14 ngày</option>
                                    <option value="15+">15+ ngày</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <label class="form-label">Giá</label>
                                <select class="form-select" id="priceFilter">
                                    <option value="">Tất cả</option>
                                    <option value="0-5">Dưới 5 triệu</option>
                                    <option value="5-10">5-10 triệu</option>
                                    <option value="10-20">10-20 triệu</option>
                                    <option value="20+">Trên 20 triệu</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Tìm kiếm</label>
                                <input type="text" class="form-control" id="searchInput" placeholder="Nhập tên tour...">
                            </div>
                            <div class="col-lg-2 col-md-12">
                                <button class="btn btn-primary w-100" onclick="filterTours()">
                                    <i class="fas fa-search me-2"></i>Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tours Section -->
    <section class="py-5">
        <div class="container">
            <!-- Filter Results Info -->
            <div class="row mb-4">
                <div class="col-lg-6">
                    <p class="filter-results">Hiển thị <span id="tourCount">12</span> tours</p>
                </div>
                <div class="col-lg-6">
                    <div class="sort-options text-end">
                        <label class="form-label me-2">Sắp xếp theo:</label>
                        <select class="form-select d-inline-block w-auto" id="sortBy">
                            <option value="default">Mặc định</option>
                            <option value="price-low">Giá thấp đến cao</option>
                            <option value="price-high">Giá cao đến thấp</option>
                            <option value="duration">Thời gian</option>
                            <option value="rating">Đánh giá</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Tours Grid -->
            <div class="row" id="toursContainer">
               <?php foreach ($result as $tour): ?>
                <!-- Tour 3 -->
                <div class="col-lg-6 col-xl-4 mb-4 tour-item" data-destination="singapore" data-duration="3" data-price="9.5">
                    <div class="tour-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="tour-image">
                            <img src="<?php echo $tour['image_url']; ?>" alt="<?php echo $tour['name']; ?>" class="img-fluid">
                            <div class="tour-badge new">Mới</div>
                            <div class="tour-overlay">
                                <a href="#" class="btn btn-light tour-view-btn">Xem Chi Tiết</a>
                            </div>
                        </div>
                        <div class="tour-content">
                            <div class="tour-header">
                                <h5><?php echo $tour['name']; ?></h5>
                                <div class="tour-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <span><?php echo $tour['rating']; ?></span>
                                </div>
                            </div>
                            <div class="tour-meta">
                                <span><i class="fas fa-map-marker-alt text-primary me-1"></i><?php echo $tour['destination']; ?></span>
                                <span><i class="fas fa-calendar-alt text-primary me-1"></i><?php echo $tour['duration']; ?></span>
                            </div>
                            <p class="tour-description">
                                <?php echo $tour['description']; ?>
                            </p>
                            <div class="tour-highlights">
                                <span class="highlight-tag">Universal Studios</span>
                                <span class="highlight-tag">Gardens by the Bay</span>
                                <span class="highlight-tag">Marina Bay</span>
                            </div>
                            <div class="tour-footer">
                                <div class="tour-price">
                                    <span class="price-from">Từ</span>
                                    <span class="price-amount"><?php echo number_format($tour['price'], 0, ',', '.'); ?>₫</span>
                                    <span class="price-person">/người</span>
                                </div>
                                <button href="./pages/tour-detail.php?id=<?php echo $tour['id']; ?>" class="btn btn-primary btn-book">Đặt Ngay</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- Tour 4 -->
                <!-- <div class="col-lg-6 col-xl-4 mb-4 tour-item" data-destination="japan" data-duration="7" data-price="18.9">
                    <div class="tour-card" data-aos="fade-up">
                        <div class="tour-image">
                            <img src="https://images.unsplash.com/photo-1542051841857-5f90071e7989?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Japan Tour" class="img-fluid">
                            <div class="tour-badge premium">Premium</div>
                            <div class="tour-overlay">
                                <a href="#" class="btn btn-light tour-view-btn">Xem Chi Tiết</a>
                            </div>
                        </div>
                        <div class="tour-content">
                            <div class="tour-header">
                                <h5>Nhật Bản 7N6Đ - Tokyo & Osaka</h5>
                                <div class="tour-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <span>4.9</span>
                                </div>
                            </div>
                            <div class="tour-meta">
                                <span><i class="fas fa-map-marker-alt text-primary me-1"></i>Nhật Bản</span>
                                <span><i class="fas fa-calendar-alt text-primary me-1"></i>7 ngày 6 đêm</span>
                            </div>
                            <p class="tour-description">
                                Khám phá xứ sở hoa anh đào với Tokyo hiện đại và Osaka truyền thống, trải nghiệm văn hóa độc đáo.
                            </p>
                            <div class="tour-highlights">
                                <span class="highlight-tag">Phú Sĩ</span>
                                <span class="highlight-tag">Disneyland</span>
                                <span class="highlight-tag">Onsen</span>
                            </div>
                            <div class="tour-footer">
                                <div class="tour-price">
                                    <span class="price-from">Từ</span>
                                    <span class="price-amount">18,900,000₫</span>
                                    <span class="price-person">/người</span>
                                </div>
                                <button class="btn btn-primary btn-book">Đặt Ngay</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Tour 5 -->
                <!-- <div class="col-lg-6 col-xl-4 mb-4 tour-item" data-destination="korea" data-duration="5" data-price="12.5">
                    <div class="tour-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="tour-image">
                            <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Korea Tour" class="img-fluid">
                            <div class="tour-badge hot">Hot</div>
                            <div class="tour-overlay">
                                <a href="#" class="btn btn-light tour-view-btn">Xem Chi Tiết</a>
                            </div>
                        </div>
                        <div class="tour-content">
                            <div class="tour-header">
                                <h5>Hàn Quốc 5N4Đ - Seoul & Busan</h5>
                                <div class="tour-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <span>4.6</span>
                                </div>
                            </div>
                            <div class="tour-meta">
                                <span><i class="fas fa-map-marker-alt text-primary me-1"></i>Hàn Quốc</span>
                                <span><i class="fas fa-calendar-alt text-primary me-1"></i>5 ngày 4 đêm</span>
                            </div>
                            <p class="tour-description">
                                Trải nghiệm văn hóa K-pop, thưởng thức ẩm thực và khám phá những điểm đến nổi tiếng của Hàn Quốc.
                            </p>
                            <div class="tour-highlights">
                                <span class="highlight-tag">Myeongdong</span>
                                <span class="highlight-tag">Jeju Island</span>
                                <span class="highlight-tag">K-BBQ</span>
                            </div>
                            <div class="tour-footer">
                                <div class="tour-price">
                                    <span class="price-from">Từ</span>
                                    <span class="price-amount">12,500,000₫</span>
                                    <span class="price-person">/người</span>
                                </div>
                                <button class="btn btn-primary btn-book">Đặt Ngay</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Tour 6 -->
                <!-- <div class="col-lg-6 col-xl-4 mb-4 tour-item" data-destination="europe" data-duration="10" data-price="45">
                    <div class="tour-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="tour-image">
                            <img src="https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Europe Tour" class="img-fluid">
                            <div class="tour-badge luxury">Luxury</div>
                            <div class="tour-overlay">
                                <a href="#" class="btn btn-light tour-view-btn">Xem Chi Tiết</a>
                            </div>
                        </div>
                        <div class="tour-content">
                            <div class="tour-header">
                                <h5>Châu Âu 10N9Đ - Paris & Rome</h5>
                                <div class="tour-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <span>4.8</span>
                                </div>
                            </div>
                            <div class="tour-meta">
                                <span><i class="fas fa-map-marker-alt text-primary me-1"></i>Châu Âu</span>
                                <span><i class="fas fa-calendar-alt text-primary me-1"></i>10 ngày 9 đêm</span>
                            </div>
                            <p class="tour-description">
                                Khám phá kiến trúc cổ kính và văn hóa phong phú của Paris lãng mạn và Rome huyền thoại.
                            </p>
                            <div class="tour-highlights">
                                <span class="highlight-tag">Tháp Eiffel</span>
                                <span class="highlight-tag">Colosseum</span>
                                <span class="highlight-tag">Louvre</span>
                            </div>
                            <div class="tour-footer">
                                <div class="tour-price">
                                    <span class="price-from">Từ</span>
                                    <span class="price-amount">45,000,000₫</span>
                                    <span class="price-person">/người</span>
                                </div>
                                <button class="btn btn-primary btn-book">Đặt Ngay</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Additional tours can be added here -->
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-5">
                <button class="btn btn-outline-primary btn-lg" id="loadMoreBtn">
                    <i class="fas fa-plus me-2"></i>Xem Thêm Tours
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <h3 class="mb-3">Đăng Ký Nhận Thông Tin Tours Mới</h3>
                    <p class="lead mb-4">
                        Nhận thông báo về các tour mới, ưu đãi đặc biệt và những điểm đến thú vị ngay trong email của bạn.
                    </p>
                </div>

                <div class="col-lg-4" data-aos="fade-left">
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email của bạn" required>
                            <button class="btn btn-light" type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../inc/footer.php'; ?>
    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JavaScript -->
    <script src="../js/script.js"></script>

    <!-- Tours Page Specific JavaScript -->
    <script>
        // Filter and Search Functionality
        function filterTours() {
            const destination = document.getElementById('destinationFilter').value;
            const duration = document.getElementById('durationFilter').value;
            const price = document.getElementById('priceFilter').value;
            const search = document.getElementById('searchInput').value.toLowerCase();

            const tourItems = document.querySelectorAll('.tour-item');
            let visibleCount = 0;

            tourItems.forEach(item => {
                let show = true;

                // Filter by destination
                if (destination && item.dataset.destination !== destination) {
                    show = false;
                }

                // Filter by duration
                if (duration && !matchesDuration(item.dataset.duration, duration)) {
                    show = false;
                }

                // Filter by price
                if (price && !matchesPrice(item.dataset.price, price)) {
                    show = false;
                }

                // Filter by search term
                if (search && !item.querySelector('h5').textContent.toLowerCase().includes(search)) {
                    show = false;
                }

                if (show) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            document.getElementById('tourCount').textContent = visibleCount;
        }

        function matchesDuration(tourDuration, filter) {
            const duration = parseInt(tourDuration);
            switch (filter) {
                case '1-3':
                    return duration >= 1 && duration <= 3;
                case '4-7':
                    return duration >= 4 && duration <= 7;
                case '8-14':
                    return duration >= 8 && duration <= 14;
                case '15+':
                    return duration >= 15;
                default:
                    return true;
            }
        }

        function matchesPrice(tourPrice, filter) {
            const price = parseFloat(tourPrice);
            switch (filter) {
                case '0-5':
                    return price < 5;
                case '5-10':
                    return price >= 5 && price <= 10;
                case '10-20':
                    return price >= 10 && price <= 20;
                case '20+':
                    return price >= 20;
                default:
                    return true;
            }
        }

        // Sort functionality
        document.getElementById('sortBy').addEventListener('change', function() {
            const sortValue = this.value;
            const container = document.getElementById('toursContainer');
            const items = Array.from(container.children);

            items.sort((a, b) => {
                switch (sortValue) {
                    case 'price-low':
                        return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                    case 'price-high':
                        return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                    case 'duration':
                        return parseInt(a.dataset.duration) - parseInt(b.dataset.duration);
                    case 'rating':
                        const ratingA = parseFloat(a.querySelector('.tour-rating span').textContent);
                        const ratingB = parseFloat(b.querySelector('.tour-rating span').textContent);
                        return ratingB - ratingA;
                    default:
                        return 0;
                }
            });

            items.forEach(item => container.appendChild(item));
        });

        // Load more functionality
        document.getElementById('loadMoreBtn').addEventListener('click', function() {
            // Simulate loading more tours
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang tải...';

            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-plus me-2"></i>Xem Thêm Tours';
                // Here you would typically load more tours from an API
            }, 1500);
        });

        // Book tour functionality
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-book')) {
                const tourCard = e.target.closest('.tour-card');
                const tourName = tourCard.querySelector('h5').textContent;

                // Show booking notification
                if (window.TravelDream && window.TravelDream.showNotification) {
                    window.TravelDream.showNotification(`Đang chuyển đến trang đặt tour: ${tourName}`, 'info');
                }

                // In a real application, this would redirect to booking page
                // window.location.href = `booking.html?tour=${encodeURIComponent(tourName)}`;
            }
        });

        // Real-time search
        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(filterTours, 300);
        });

        // Initialize filters
        document.addEventListener('DOMContentLoaded', function() {
            filterTours();
        });
    </script>

    <!-- Additional CSS for Tours Page -->
    <style>
        .page-header {
            height: 60vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .page-header-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .page-header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(46, 134, 171, 0.8);
        }

        .page-title {
            font-size: 3rem;
            font-weight: 700;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 1rem;
        }

        .page-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
        }

        .search-filter-bar {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .tour-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(46, 134, 171, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .tour-card:hover .tour-overlay {
            opacity: 1;
        }

        .tour-view-btn {
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 25px;
        }

        .tour-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: white;
            z-index: 2;
        }

        .tour-badge.sale {
            background: #C73E1D;
        }

        .tour-badge.new {
            background: #28a745;
        }

        .tour-badge.hot {
            background: #fd7e14;
        }

        .tour-badge.premium {
            background: #6f42c1;
        }

        .tour-badge.luxury {
            background: #d4af37;
        }

        .tour-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .tour-highlights {
            margin-bottom: 1.5rem;
        }

        .highlight-tag {
            display: inline-block;
            background: #e9ecef;
            color: #495057;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-right: 8px;
            margin-bottom: 5px;
        }

        .tour-price {
            display: flex;
            align-items: baseline;
            gap: 5px;
        }

        .price-original {
            text-decoration: line-through;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .price-from {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .price-amount {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2E86AB;
        }

        .price-person {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .filter-results {
            color: #6c757d;
            margin: 0;
        }

        .sort-options .form-select {
            width: 200px;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .search-filter-bar {
                padding: 1.5rem;
            }

            .tour-meta {
                flex-direction: column;
                gap: 10px;
            }

            .sort-options {
                text-align: start !important;
                margin-top: 1rem;
            }

            .sort-options .form-select {
                width: 100%;
            }
        }
    </style>

</body>

</html>