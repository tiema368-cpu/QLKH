<?php
// Cấu hình database
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));
define('DB_NAME', getenv('DB_NAME'));

// Kết nối database
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Kết nối database thất bại: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8mb4");
    return $conn;
}

// Hàm lưu đề tài nghiên cứu
function saveResearchData($data) {
    $conn = getDBConnection();
    
    $stmt = $conn->prepare("INSERT INTO research_topics (name, code, level, start_year, end_year, budget, status, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", 
        $data['name'], 
        $data['code'], 
        $data['level'], 
        $data['start_year'], 
        $data['end_year'], 
        $data['budget'], 
        $data['status'], 
        $data['role']
    );
    
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    return $result;
}

// Các hàm lưu dữ liệu khác tương tự...
function savePaperData($data) {
    // Implementation for paper data
}

function saveBookData($data) {
    // Implementation for book data
}

function saveGuidanceData($data) {
    // Implementation for guidance data
}

function saveAwardData($data) {
    // Implementation for award data
}
?>