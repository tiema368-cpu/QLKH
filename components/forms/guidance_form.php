<?php
// Lấy dữ liệu từ database (nếu có)
$guidances = []; // Thay bằng hàm lấy từ database
?>

<div class="guidance-form">
    <div class="section-header">
        <h3 class="section-title">Hướng dẫn SV NCKH</h3>
        <button type="button" class="add-btn" id="addGuidanceBtn">
            <i class="ri-add-line"></i> Thêm hướng dẫn
        </button>
    </div>

    <form method="POST" id="guidanceForm">
        <div id="guidanceContainer">
            <?php if (empty($guidances)): ?>
            <div class="form-card" data-index="0">
                <div class="card-header">
                    <h4 class="card-title">Hướng dẫn 1</h4>
                    <button type="button" class="delete-btn" style="display: none;">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
                
                <div class="form-grid-2">
                    <div class="form-group">
                        <label>Tên sinh viên *</label>
                        <input type="text" name="guidance[0][student_name]" required placeholder="Nhập tên sinh viên">
                    </div>
                    
                    <div class="form-group">
                        <label>Mã số sinh viên *</label>
                        <input type="text" name="guidance[0][student_id]" required placeholder="Nhập mã số sinh viên">
                    </div>
                    
                    <div class="form-group">
                        <label>Cấp độ *</label>
                        <select name="guidance[0][level]" required>
                            <option value="">Chọn cấp độ</option>
                            <option value="undergraduate">Đại học</option>
                            <option value="master">Thạc sĩ</option>
                            <option value="phd">Tiến sĩ</option>
                            <option value="research">NCKH sinh viên</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Vai trò *</label>
                        <select name="guidance[0][role]" required>
                            <option value="">Chọn vai trò</option>
                            <option value="supervisor">Giảng viên hướng dẫn</option>
                            <option value="co-supervisor">Đồng hướng dẫn</option>
                            <option value="advisor">Cố vấn</option>
                        </select>
                    </div>
                    
                    <div class="form-group full-width">
                        <label>Đề tài *</label>
                        <input type="text" name="guidance[0][topic]" required placeholder="Nhập tên đề tài">
                    </div>
                    
                    <div class="form-group">
                        <label>Năm bắt đầu *</label>
                        <input type="number" name="guidance[0][start_year]" required placeholder="2024" min="2000" max="2030">
                    </div>
                    
                    <div class="form-group">
                        <label>Năm kết thúc</label>
                        <input type="number" name="guidance[0][end_year]" placeholder="2025" min="2000" max="2030">
                    </div>
                    
                    <div class="form-group">
                        <label>Tình trạng *</label>
                        <select name="guidance[0][status]" required>
                            <option value="">Chọn tình trạng</option>
                            <option value="ongoing">Đang thực hiện</option>
                            <option value="completed">Đã hoàn thành</option>
                            <option value="defended">Đã bảo vệ</option>
                            <option value="cancelled">Đã hủy</option>
                        </select>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <!-- Hiển thị dữ liệu từ database -->
            <?php endif; ?>
        </div>

        <div class="save-section">
            <button type="submit" name="save_guidance" class="save-btn">
                <i class="ri-save-line"></i> Lưu thông tin
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('addGuidanceBtn').addEventListener('click', function() {
    const container = document.getElementById('guidanceContainer');
    const index = container.children.length;
    
    if (index >= 10) {
        alert('Tối đa 10 hướng dẫn được phép thêm');
        return;
    }
    
    const newCard = document.createElement('div');
    newCard.className = 'form-card';
    newCard.innerHTML = `
        <div class="card-header">
            <h4 class="card-title">Hướng dẫn ${index + 1}</h4>
            <button type="button" class="delete-btn" onclick="this.parentElement.parentElement.remove()">
                <i class="ri-delete-bin-line"></i>
            </button>
        </div>
        
        <div class="form-grid-2">
            <div class="form-group">
                <label>Tên sinh viên *</label>
                <input type="text" name="guidance[${index}][student_name]" required placeholder="Nhập tên sinh viên">
            </div>
            
            <div class="form-group">
                <label>Mã số sinh viên *</label>
                <input type="text" name="guidance[${index}][student_id]" required placeholder="Nhập mã số sinh viên">
            </div>
            
            <div class="form-group">
                <label>Cấp độ *</label>
                <select name="guidance[${index}][level]" required>
                    <option value="">Chọn cấp độ</option>
                    <option value="undergraduate">Đại học</option>
                    <option value="master">Thạc sĩ</option>
                    <option value="phd">Tiến sĩ</option>
                    <option value="research">NCKH sinh viên</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Vai trò *</label>
                <select name="guidance[${index}][role]" required>
                    <option value="">Chọn vai trò</option>
                    <option value="supervisor">Giảng viên hướng dẫn</option>
                    <option value="co-supervisor">Đồng hướng dẫn</option>
                    <option value="advisor">Cố vấn</option>
                </select>
            </div>
            
            <div class="form-group full-width">
                <label>Đề tài *</label>
                <input type="text" name="guidance[${index}][topic]" required placeholder="Nhập tên đề tài">
            </div>
            
            <div class="form-group">
                <label>Năm bắt đầu *</label>
                <input type="number" name="guidance[${index}][start_year]" required placeholder="2024" min="2000" max="2030">
            </div>
            
            <div class="form-group">
                <label>Năm kết thúc</label>
                <input type="number" name="guidance[${index}][end_year]" placeholder="2025" min="2000" max="2030">
            </div>
            
            <div class="form-group">
                <label>Tình trạng *</label>
                <select name="guidance[${index}][status]" required>
                    <option value="">Chọn tình trạng</option>
                    <option value="ongoing">Đang thực hiện</option>
                    <option value="completed">Đã hoàn thành</option>
                    <option value="defended">Đã bảo vệ</option>
                    <option value="cancelled">Đã hủy</option>
                </select>
            </div>
        </div>
    `;
    
    container.appendChild(newCard);
});
</script>