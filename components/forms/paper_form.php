<?php
// Lấy dữ liệu từ database (nếu có)
$papers = []; // Thay bằng hàm lấy từ database
?>

<div class="paper-form">
    <div class="section-header">
        <h3 class="section-title">Danh sách bài báo khoa học</h3>
        <button type="button" class="add-btn" id="addPaperBtn">
            <i class="ri-add-line"></i> Thêm bài báo
        </button>
    </div>

    <form method="POST" id="paperForm">
        <div id="paperContainer">
            <?php if (empty($papers)): ?>
            <div class="form-card" data-index="0">
                <div class="card-header">
                    <h4 class="card-title">Bài báo 1</h4>
                    <button type="button" class="delete-btn" style="display: none;">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
                
                <div class="form-grid-2">
                    <div class="form-group full-width">
                        <label>Tiêu đề bài báo *</label>
                        <input type="text" name="paper[0][title]" required placeholder="Nhập tiêu đề bài báo">
                    </div>
                    
                    <div class="form-group">
                        <label>Tên tạp chí *</label>
                        <input type="text" name="paper[0][journal]" required placeholder="Nhập tên tạp chí">
                    </div>
                    
                    <div class="form-group">
                        <label>Năm xuất bản *</label>
                        <input type="number" name="paper[0][year]" required placeholder="2024" min="2000" max="2030">
                    </div>
                    
                    <div class="form-group">
                        <label>Tác giả *</label>
                        <input type="text" name="paper[0][authors]" required placeholder="Danh sách tác giả">
                    </div>
                    
                    <div class="form-group">
                        <label>Vai trò *</label>
                        <select name="paper[0][role]" required>
                            <option value="">Chọn vai trò</option>
                            <option value="first">Tác giả chính</option>
                            <option value="corresponding">Tác giả liên hệ</option>
                            <option value="coauthor">Đồng tác giả</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Số tập</label>
                        <input type="text" name="paper[0][volume]" placeholder="Số tập">
                    </div>
                    
                    <div class="form-group">
                        <label>Trang</label>
                        <input type="text" name="paper[0][pages]" placeholder="1-10">
                    </div>
                    
                    <div class="form-group">
                        <label>Chỉ mục *</label>
                        <select name="paper[0][indexing]" required>
                            <option value="">Chọn chỉ mục</option>
                            <option value="scopus">Scopus</option>
                            <option value="isi">ISI/WoS</option>
                            <option value="other">Khác</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>DOI</label>
                        <input type="text" name="paper[0][doi]" placeholder="10.xxxx/xxxxx">
                    </div>
                </div>
            </div>
            <?php else: ?>
                <!-- Hiển thị dữ liệu từ database -->
            <?php endif; ?>
        </div>

        <div class="save-section">
            <button type="submit" name="save_paper" class="save-btn">
                <i class="ri-save-line"></i> Lưu thông tin
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('addPaperBtn').addEventListener('click', function() {
    const container = document.getElementById('paperContainer');
    const index = container.children.length;
    
    if (index >= 10) {
        alert('Tối đa 10 bài báo được phép thêm');
        return;
    }
    
    const newCard = document.createElement('div');
    newCard.className = 'form-card';
    newCard.innerHTML = `
        <div class="card-header">
            <h4 class="card-title">Bài báo ${index + 1}</h4>
            <button type="button" class="delete-btn" onclick="this.parentElement.parentElement.remove()">
                <i class="ri-delete-bin-line"></i>
            </button>
        </div>
        
        <div class="form-grid-2">
            <div class="form-group full-width">
                <label>Tiêu đề bài báo *</label>
                <input type="text" name="paper[${index}][title]" required placeholder="Nhập tiêu đề bài báo">
            </div>
            
            <div class="form-group">
                <label>Tên tạp chí *</label>
                <input type="text" name="paper[${index}][journal]" required placeholder="Nhập tên tạp chí">
            </div>
            
            <div class="form-group">
                <label>Năm xuất bản *</label>
                <input type="number" name="paper[${index}][year]" required placeholder="2024" min="2000" max="2030">
            </div>
            
            <div class="form-group">
                <label>Tác giả *</label>
                <input type="text" name="paper[${index}][authors]" required placeholder="Danh sách tác giả">
            </div>
            
            <div class="form-group">
                <label>Vai trò *</label>
                <select name="paper[${index}][role]" required>
                    <option value="">Chọn vai trò</option>
                    <option value="first">Tác giả chính</option>
                    <option value="corresponding">Tác giả liên hệ</option>
                    <option value="coauthor">Đồng tác giả</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Số tập</label>
                <input type="text" name="paper[${index}][volume]" placeholder="Số tập">
            </div>
            
            <div class="form-group">
                <label>Trang</label>
                <input type="text" name="paper[${index}][pages]" placeholder="1-10">
            </div>
            
            <div class="form-group">
                <label>Chỉ mục *</label>
                <select name="paper[${index}][indexing]" required>
                    <option value="">Chọn chỉ mục</option>
                    <option value="scopus">Scopus</option>
                    <option value="isi">ISI/WoS</option>
                    <option value="other">Khác</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>DOI</label>
                <input type="text" name="paper[${index}][doi]" placeholder="10.xxxx/xxxxx">
            </div>
        </div>
    `;
    
    container.appendChild(newCard);
});
</script>