<?php
// Lấy dữ liệu từ database (nếu có)
$research_topics = []; // Thay bằng hàm lấy từ database
?>

<div class="research-form">
    <div class="section-header">
        <h3 class="section-title">Danh sách đề tài nghiên cứu/TLTK</h3>
        <button type="button" class="add-btn" id="addResearchBtn">
            <i class="ri-add-line"></i> Thêm đề tài
        </button>
    </div>

    <form method="POST" id="researchForm">
        <div id="researchContainer">
            <?php if (empty($research_topics)): ?>
            <div class="form-card" data-index="0">
                <div class="card-header">
                    <h4 class="card-title">Đề tài 1</h4>
                    <button type="button" class="delete-btn" style="display: none;">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
                
                <div class="form-grid-2">
                    <div class="form-group">
                        <label>Tên đề tài *</label>
                        <input type="text" name="research[0][name]" required placeholder="Nhập tên đề tài">
                    </div>
                    
                    <div class="form-group">
                        <label>Mã số đề tài *</label>
                        <input type="text" name="research[0][code]" required placeholder="Nhập mã số">
                    </div>
                    
                    <div class="form-group">
                        <label>Cấp đề tài *</label>
                        <select name="research[0][level]" required>
                            <option value="">Chọn cấp</option>
                            <option value="national">Cấp quốc gia</option>
                            <option value="ministry">Cấp bộ</option>
                            <option value="provincial">Cấp tỉnh</option>
                            <option value="university">Cấp trường</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Vai trò *</label>
                        <select name="research[0][role]" required>
                            <option value="">Chọn vai trò</option>
                            <option value="leader">Chủ nhiệm</option>
                            <option value="member">Thành viên</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Năm bắt đầu *</label>
                        <input type="number" name="research[0][start_year]" required placeholder="2024" min="2000" max="2030">
                    </div>
                    
                    <div class="form-group">
                        <label>Năm kết thúc *</label>
                        <input type="number" name="research[0][end_year]" required placeholder="2025" min="2000" max="2030">
                    </div>
                    
                    <div class="form-group">
                        <label>Kinh phí (triệu đồng)</label>
                        <input type="number" name="research[0][budget]" placeholder="0" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label>Tình trạng *</label>
                        <select name="research[0][status]" required>
                            <option value="">Chọn tình trạng</option>
                            <option value="ongoing">Đang thực hiện</option>
                            <option value="completed">Đã hoàn thành</option>
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
            <button type="submit" name="save_research" class="save-btn">
                <i class="ri-save-line"></i> Lưu thông tin
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('addResearchBtn').addEventListener('click', function() {
    const container = document.getElementById('researchContainer');
    const index = container.children.length;
    
    const newCard = document.createElement('div');
    newCard.className = 'form-card';
    newCard.innerHTML = `
        <div class="card-header">
            <h4 class="card-title">Đề tài ${index + 1}</h4>
            <button type="button" class="delete-btn" onclick="this.parentElement.parentElement.remove()">
                <i class="ri-delete-bin-line"></i>
            </button>
        </div>
        
        <div class="form-grid-2">
            <div class="form-group">
                <label>Tên đề tài *</label>
                <input type="text" name="research[${index}][name]" required placeholder="Nhập tên đề tài">
            </div>
            
            <div class="form-group">
                <label>Mã số đề tài *</label>
                <input type="text" name="research[${index}][code]" required placeholder="Nhập mã số">
            </div>
            
            <div class="form-group">
                <label>Cấp đề tài *</label>
                <select name="research[${index}][level]" required>
                    <option value="">Chọn cấp</option>
                    <option value="national">Cấp quốc gia</option>
                    <option value="ministry">Cấp bộ</option>
                    <option value="provincial">Cấp tỉnh</option>
                    <option value="university">Cấp trường</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Vai trò *</label>
                <select name="research[${index}][role]" required>
                    <option value="">Chọn vai trò</option>
                    <option value="leader">Chủ nhiệm</option>
                    <option value="member">Thành viên</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Năm bắt đầu *</label>
                <input type="number" name="research[${index}][start_year]" required placeholder="2024" min="2000" max="2030">
            </div>
            
            <div class="form-group">
                <label>Năm kết thúc *</label>
                <input type="number" name="research[${index}][end_year]" required placeholder="2025" min="2000" max="2030">
            </div>
            
            <div class="form-group">
                <label>Kinh phí (triệu đồng)</label>
                <input type="number" name="research[${index}][budget]" placeholder="0" min="0">
            </div>
            
            <div class="form-group">
                <label>Tình trạng *</label>
                <select name="research[${index}][status]" required>
                    <option value="">Chọn tình trạng</option>
                    <option value="ongoing">Đang thực hiện</option>
                    <option value="completed">Đã hoàn thành</option>
                    <option value="cancelled">Đã hủy</option>
                </select>
            </div>
        </div>
    `;
    
    container.appendChild(newCard);
});
</script>