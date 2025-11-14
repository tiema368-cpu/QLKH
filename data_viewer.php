<?php
require_once 'config.php';
$conn = getDBConnection();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem dữ liệu sản phẩm khoa học</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Dữ liệu sản phẩm khoa học</h1>

        <h2>Đề tài nghiên cứu</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên đề tài</th>
                    <th>Mã số</th>
                    <th>Cấp</th>
                    <th>Năm bắt đầu</th>
                    <th>Năm kết thúc</th>
                    <th>Kinh phí</th>
                    <th>Trạng thái</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM research_topics");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['code']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['level']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['start_year']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['end_year']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['budget']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Bài báo khoa học</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên bài báo</th>
                    <th>Tạp chí</th>
                    <th>Tác giả</th>
                    <th>Năm</th>
                    <th>DOI</th>
                    <th>Chỉ mục</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM scientific_papers");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['journal']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['authors']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['doi']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['indexing']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Sách/Giáo trình</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên sách</th>
                    <th>ISBN</th>
                    <th>Nhà xuất bản</th>
                    <th>Năm</th>
                    <th>Loại</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM books");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['isbn']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['publisher']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Hướng dẫn sinh viên</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên sinh viên</th>
                    <th>Mã sinh viên</th>
                    <th>Cấp</th>
                    <th>Đề tài</th>
                    <th>Năm bắt đầu</th>
                    <th>Trạng thái</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM student_guidance");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['student_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['level']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['topic']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['start_year']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Giải thưởng</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên giải thưởng</th>
                    <th>Cấp</th>
                    <th>Năm</th>
                    <th>Tổ chức</th>
                    <th>Lĩnh vực</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM awards");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['level']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['organization']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="index.php">Quay lại trang chủ</a>
    </div>
</body>
</html>
