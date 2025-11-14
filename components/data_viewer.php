<?php
session_start();
require_once 'config.php';

// Lấy dữ liệu từ database
$conn = getDBConnection();
$data = [];

// Lấy dữ liệu tổng hợp
$query = "
    SELECT 
        l.name,
        l.faculty,
        l.department,
        COUNT(DISTINCT r.id) as research_count,
        COUNT(DISTINCT p.id) as paper_count,
        COUNT(DISTINCT b.id) as book_count,
        COUNT(DISTINCT g.id) as guidance_count,
        COUNT(DISTINCT a.id) as award_count
    FROM lecturers l
    LEFT JOIN research_topics r ON l.id = r.lecturer_id
    LEFT JOIN scientific_papers p ON l.id = p.lecturer_id
    LEFT JOIN books b ON l.id = b.lecturer_id
    LEFT JOIN student_guidance g ON l.id = g.lecturer_id
    LEFT JOIN awards a ON l.id = a.lecturer_id
    GROUP BY l.id
";

$result = $conn->query($query);
if ($result) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem dữ liệu - Hệ thống quản lý sản phẩm khoa học</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css" rel="stylesheet">
</head>
<body>
    <?php include 'components/header.php'; ?>
    
    <div class="container">
        <div class="main-content">
            <div style="padding: 25px; border-bottom: 1px solid #eee;">
                <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 20px;">
                    <a href="index.php" class="view-data-btn" style="background: var(--primary);">
                        <i class="ri-arrow-left-line"></i> Quay lại
                    </a>
                    <h2 style="color: var(--dark); margin: 0;">Kiểm tra dữ liệu</h2>
                </div>
                
                <div style="display: flex; justify-content: flex-end;">
                    <button onclick="exportData()" class="save-btn" style="background: var(--success);">
                        <i class="ri-download-line"></i> Xuất file minh chứng
                    </button>
                </div>
            </div>

            <div style="padding: 25px;">
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; background: white;">
                        <thead>
                            <tr style="background: #f8f9fa;">
                                <th style="padding: 12px; text-align: left; border: 1px solid #dee2e6;">Họ và tên</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #dee2e6;">Khoa/Bộ môn</th>
                                <th style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">Đề tài</th>
                                <th style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">Bài báo</th>
                                <th style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">Sách</th>
                                <th style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">Hướng dẫn</th>
                                <th style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">Giải thưởng</th>
                                <th style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($data)): ?>
                            <tr>
                                <td colspan="8" style="padding: 40px; text-align: center; color: #6c757d;">
                                    <i class="ri-file-list-line" style="font-size: 48px; margin-bottom: 15px; display: block;"></i>
                                    Chưa có dữ liệu
                                </td>
                            </tr>
                            <?php else: ?>
                                <?php foreach ($data as $row): ?>
                                <tr style="border-bottom: 1px solid #dee2e6;">
                                    <td style="padding: 12px; border: 1px solid #dee2e6;"><?= htmlspecialchars($row['name']) ?></td>
                                    <td style="padding: 12px; border: 1px solid #dee2e6;">
                                        <div><?= htmlspecialchars($row['faculty']) ?></div>
                                        <div style="color: #6c757d; font-size: 0.9em;"><?= htmlspecialchars($row['department']) ?></div>
                                    </td>
                                    <td style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">
                                        <span style="background: #dbeafe; color: #1e40af; padding: 4px 8px; border-radius: 12px; font-size: 0.8em;">
                                            <?= $row['research_count'] ?>
                                        </span>
                                    </td>
                                    <td style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">
                                        <span style="background: #dcfce7; color: #166534; padding: 4px 8px; border-radius: 12px; font-size: 0.8em;">
                                            <?= $row['paper_count'] ?>
                                        </span>
                                    </td>
                                    <td style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">
                                        <span style="background: #f3e8ff; color: #7e22ce; padding: 4px 8px; border-radius: 12px; font-size: 0.8em;">
                                            <?= $row['book_count'] ?>
                                        </span>
                                    </td>
                                    <td style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">
                                        <span style="background: #fef9c3; color: #854d0e; padding: 4px 8px; border-radius: 12px; font-size: 0.8em;">
                                            <?= $row['guidance_count'] ?>
                                        </span>
                                    </td>
                                    <td style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">
                                        <span style="background: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 12px; font-size: 0.8em;">
                                            <?= $row['award_count'] ?>
                                        </span>
                                    </td>
                                    <td style="padding: 12px; text-align: center; border: 1px solid #dee2e6;">
                                        <div style="display: flex; gap: 10px; justify-content: center;">
                                            <button style="background: none; border: none; color: var(--primary); cursor: pointer;">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <button style="background: none; border: none; color: var(--success); cursor: pointer;">
                                                <i class="ri-edit-line"></i>
                                            </button>
                                            <button style="background: none; border: none; color: var(--danger); cursor: pointer;">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <div style="padding: 20px; border-top: 1px solid #dee2e6; background: #f8f9fa; display: flex; justify-content: space-between; align-items: center;">
                    <div style="color: #6c757d; font-size: 0.9em;">
                        Hiển thị <?= count($data) ?> kết quả
                    </div>
                    <div style="color: #6c757d; font-size: 0.9em;">
                        <strong>Lưu ý:</strong> Nếu dữ liệu nhập sai, vui lòng nhập lại toàn bộ tab tương ứng
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function exportData() {
        alert('Đang xuất file minh chứng...');
        // Thêm logic export file ở đây
    }
    </script>
</body>
</html>
