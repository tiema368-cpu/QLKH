<?php
// Lấy dữ liệu từ database (nếu có)
$awards = []; // Thay bằng hàm lấy từ database
?>

<div class="award-form">
    <div class="section-header">
        <h3 class="section-title">Giải thưởng</h3>
        <button type="button" class="add-btn" id="addAwardBtn">
            <i class="ri-add-line"></i> Thêm giải thưởng
        </button>
    </div>

    <form method="POST" id="awardForm">
        <div id="awardContainer">
            <?php if (empty($awards)): ?>
            <div class="form-card" data-index="0">
                <div class="card-header">
                    <h4 class="card-title">Giải thưởng 1</h4>
                    <button type="button" class="delete-btn" style="display: none;">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
                
                <div class="form-grid-2">
                    <div class="form-group full-width">
                        <label>Tên giải thưởng *</label>
                        <input type="text" name="award[0][name]" required placeholder="Nhập tên giải thưởng">
                    </div>
                    
                    <div class="form-group">
                        <label>Cấp giải thưởng *</label>
                        <select name="award[0][level]" required>
                            <option value="">Chọn cấp</option>
                            <option value="international">Quốc tế</option>
                            <option value="national">Quốc gia</option>
                            <option value="ministry">Bộ/Ngành</option>
                            <option value="provincial">Tỉnh/Thành phố</option>
                            <option value="university">Trường</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Năm nhận giải *</label>
                        <input type="number" name="award[0][year]" required placeholder="2024" min="2000" max="2030">
                    </div>
                    
                    <div class="form-group">
                        <label>Tổ chức trao giải *</label>
                        <input type="text" name="award[0][organization]" required placeholder="Nhập tên tổ chức">
                    </div>
                    
                    <div class="form-group">
                        <label>Lĩnh vực *</label>
                        <select name="award[0][category]" required>
                            <option value="">Chọn lĩnh vực</option>
                            <option value="research">Nghiên cứu khoa học</option>
                            <option value="teaching">Giảng dạy</option>
                            <option value="innovation">Sáng tạo</option>
                            <option value="technology">Công nghệ</option>
                            <option value="social">Hoạt động xã hội</option>
                            <option value="other">Khác</option>
                        </select>
                    </div>
                    
                    <div class="form-group full-width">
                        <label>Mô tả</label>
                        <textarea name="award[0][description]" rows="3" placeholder="Mô tả chi tiết về giải thưởng"></textarea>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <!-- Hiển thị dữ liệu từ database -->
            <?php endif; ?>
        </div>

        <div class="save-section">
            <button type="submit" name="save_award" class="save-btn">
                <i class="ri-save-line"></i> Lưu thông tin
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('addAwardBtn').addEventListener('click', function() {
    const container = document.getElementById('awardContainer');
    const index = container.children.length;
    
    if (index >= 10) {
        alert('Tối đa 10 giải thưởng được phép thêm');
        return;
    }
    
    const newCard = document.createElement('div');
    newCard.className = 'form-card';
    newCard.innerHTML = `
        <div class="card-header">
            <h4 class="card-title">Giải thưởng ${index + 1}</h4>
            <button type="button" class="delete-btn" onclick="this.parentElement.parentElement.remove()">
                <i class="ri-delete-bin-line"></i>
            </button>
        </div>
        
        <div class="form-grid-2">
            <div class="form-group full-width">
                <label>Tên giải thưởng *</label>
                <input type="text" name="award[${index}][name]" required placeholder="Nhập tên giải thưởng">
            </div>
            
            <div class="form-group">
                <label>Cấp giải thưởng *</label>
                <select name="award[${index}][level]" required>
                    <option value="">Chọn cấp</option>
                    <option value="international">Quốc tế</option>
                    <option value="national">Quốc gia</option>
                    <option value="ministry">Bộ/Ngành</option>
                    <option value="provincial">Tỉnh/Thành phố</option>
                    <option value="university">Trường</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Năm nhận giải *</label>
                <input type="number" name="award[${index}][year]" required placeholder="2024" min="2000" max="2030">
            </div>
            
            <div class="form-group">
                <label>Tổ chức trao giải *</label>
                <input type="text" name="award[${index}][organization]" required placeholder="Nhập tên tổ chức">
            </div>
            
            <div class="form-group">
                <label>Lĩnh vực *</label>
                <select name="award[${index}][category]" required>
                    <option value="">Chọn lĩnh vực</option>
                    <option value="research">Nghiên cứu khoa học</option>
                    <option value="teaching">Giảng dạy</option>
                    <option value="innovation">Sáng tạo</option>
                    <option value="technology">Công nghệ</option>
                    <option value="social">Hoạt động xã hội</option>
                    <option value="other">Khác</option>
                </select>
            </div>
            
            <div class="form-group full-width">
                <label>Mô tả</label>
                <textarea name="award[${index}][description]" rows="3" placeholder="Mô tả chi tiết về giải thưởng"></textarea>
            </div>
        </div>
    `;
    
    container.appendChild(newCard);
});
</script>