<?php
session_start();
require_once 'config.php';

// Xử lý form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save_research'])) {
        // Xử lý lưu đề tài nghiên cứu
        saveResearchData($_POST);
    } elseif (isset($_POST['save_paper'])) {
        // Xử lý lưu bài báo
        savePaperData($_POST);
    } elseif (isset($_POST['save_book'])) {
        // Xử lý lưu sách
        saveBookData($_POST);
    } elseif (isset($_POST['save_guidance'])) {
        // Xử lý lưu hướng dẫn SV
        saveGuidanceData($_POST);
    } elseif (isset($_POST['save_award'])) {
        // Xử lý lưu giải thưởng
        saveAwardData($_POST);
    }
}

$active_tab = $_GET['tab'] ?? 'research';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý sản phẩm khoa học - Trường Đại học Tan Trao</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css" rel="stylesheet">
</head>
<body>
    <?php include 'components/header.php'; ?>
    
    <div class="container">
        <div class="main-content">
            <!-- Thông tin giảng viên -->
            <div class="info-section">
                <h2>HỆ THỐNG QUẢN LÝ SẢN PHẨM KHOA HỌC</h2>
                
                <form method="POST" class="lecturer-info">
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" name="lecturer_name" placeholder="Nhập họ và tên" required>
                        </div>
                        <div class="form-group">
                            <label>Khoa / Trung tâm</label>
                            <select name="faculty" required>
                                <option value="">Chọn khoa</option>
                                <option value="cntt">Khoa Công nghệ thông tin</option>
                                <option value="kinhte">Khoa Kinh tế</option>
                                <option value="ngoaingu">Khoa Ngoại ngữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bộ môn</label>
                            <input type="text" name="department" placeholder="Vui lòng chọn khoa trước" required>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tab navigation -->
            <div class="tab-navigation">
                <a href="?tab=research" class="tab-button <?= $active_tab === 'research' ? 'active' : '' ?>">
                    <i class="ri-search-line"></i> Đề tài nghiên cứu
                </a>
                <a href="?tab=paper" class="tab-button <?= $active_tab === 'paper' ? 'active' : '' ?>">
                    <i class="ri-file-text-line"></i> Bài báo khoa học
                </a>
                <a href="?tab=book" class="tab-button <?= $active_tab === 'book' ? 'active' : '' ?>">
                    <i class="ri-book-line"></i> Sách/Giáo trình
                </a>
                <a href="?tab=guidance" class="tab-button <?= $active_tab === 'guidance' ? 'active' : '' ?>">
                    <i class="ri-user-line"></i> Hướng dẫn SV
                </a>
                <a href="?tab=award" class="tab-button <?= $active_tab === 'award' ? 'active' : '' ?>">
                    <i class="ri-award-line"></i> Giải thưởng
                </a>
            </div>

            <!-- Tab content -->
            <div class="tab-content">
                <?php
                switch ($active_tab) {
                    case 'research':
                        include 'components/forms/research_form.php';
                        break;
                    case 'paper':
                        include 'components/forms/paper_form.php';
                        break;
                    case 'book':
                        include 'components/forms/book_form.php';
                        break;
                    case 'guidance':
                        include 'components/forms/guidance_form.php';
                        break;
                    case 'award':
                        include 'components/forms/award_form.php';
                        break;
                    default:
                        include 'components/forms/research_form.php';
                }
                ?>
            </div>

            <!-- Footer actions -->
            <div class="footer-actions">
                <div class="notice">
                    Sau khi nhập xong thông tin, vui lòng kiểm tra dữ liệu trước khi lưu
                </div>
                <a href="data_viewer.php" class="view-data-btn">
                    <i class="ri-eye-line"></i> Xem dữ liệu
                </a>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>