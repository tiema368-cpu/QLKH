<?php
// Lấy dữ liệu từ database (nếu có)
$books = []; // Thay bằng hàm lấy từ database
?>

<div class="book-form">
    <div class="section-header">
        <h3 class="section-title">Danh sách sách/giáo trình/TLTK</h3>
        <button type="button" class="add-btn" id="addBookBtn">
            <i class="ri-add-line"></i> Thêm sách
        </button>
    </div>

    <form method="POST" id="bookForm">
        <div id="bookContainer">
            <?php if (empty($books)): ?>
            <div class="form-card" data-index="0">
                <div class="card-header">
                    <h4 class="card-title">Sách 1</h4>
                    <button type="button" class="delete-btn" style="display: none;">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
                
                <div class="form-grid-2">
                    <div class="form-group full-width">
                        <label>Tên sách/giáo trình *</label>
                        <input type="text" name="book[0][title]" required placeholder="Nhập tên sách/giáo trình">
                    </div>
                    
                    <div class="form-group">
                        <label>Loại *</label>
                        <select name="book[0][type]" required>
                            <option value="">Chọn loại</option>
                            <option value="textbook">Giáo trình</option>
                            <option value="reference">Tài liệu tham khảo</option>
                            <option value="monograph">Chuyên khảo</option>
                            <option value="handbook">Sổ tay</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Vai trò *</label>
                        <select name="book[0][role]" required>
                            <option value="">Chọn vai trò</option>
                            <option value="author">Tác giả</option>
                            <option value="editor">Chủ biên</option>
                            <option value="coauthor">Đồng tác giả</option>
                            <option value="translator">Dịch giả</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Nhà xuất bản *</label>
                        <input type="text" name="book[0][publisher]" required placeholder="Nhập tên nhà xuất bản">
                    </div>
                    
                    <div class="form-group">
                        <label>Năm xuất bản *</label>
                        <input type="number" name="book[0][year]" required placeholder="2024" min="2000" max="2030">
                    </div>
                    
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" name="book[0][isbn]" placeholder="978-xxx-xxx-xxx-x">
                    </div>
                    
                    <div class="form-group">
                        <label>Số trang</label>
                        <input type="number" name="book[0][pages]" placeholder="0" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label>Đồng tác giả</label>
                        <input type="text" name="book[0][co_authors]" placeholder="Danh sách đồng tác giả">
                    </div>
                </div>
            </div>
            <?php else: ?>
                <!-- Hiển thị dữ liệu từ database -->
            <?php endif; ?>
        </div>

        <div class="save-section">
            <button type="submit" name="save_book" class="save-btn">
                <i class="ri-save-line"></i> Lưu thông tin
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('addBookBtn').addEventListener('click', function() {
    const container = document.getElementById('bookContainer');
    const index = container.children.length;
    
    if (index >= 10) {
        alert('Tối đa 10 sách được phép thêm');
        return;
    }
    
    const newCard = document.createElement('div');
    newCard.className = 'form-card';
    newCard.innerHTML = `
        <div class="card-header">
            <h4 class="card-title">Sách ${index + 1}</h4>
            <button type="button" class="delete-btn" onclick="this.parentElement.parentElement.remove()">
                <i class="ri-delete-bin-line"></i>
            </button>
        </div>
        
        <div class="form-grid-2">
            <div class="form-group full-width">
                <label>Tên sách/giáo trình *</label>
                <input type="text" name="book[${index}][title]" required placeholder="Nhập tên sách/giáo trình">
            </div>
            
            <div class="form-group">
                <label>Loại *</label>
                <select name="book[${index}][type]" required>
                    <option value="">Chọn loại</option>
                    <option value="textbook">Giáo trình</option>
                    <option value="reference">Tài liệu tham khảo</option>
                    <option value="monograph">Chuyên khảo</option>
                    <option value="handbook">Sổ tay</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Vai trò *</label>
                <select name="book[${index}][role]" required>
                    <option value="">Chọn vai trò</option>
                    <option value="author">Tác giả</option>
                    <option value="editor">Chủ biên</option>
                    <option value="coauthor">Đồng tác giả</option>
                    <option value="translator">Dịch giả</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Nhà xuất bản *</label>
                <input type="text" name="book[${index}][publisher]" required placeholder="Nhập tên nhà xuất bản">
            </div>
            
            <div class="form-group">
                <label>Năm xuất bản *</label>
                <input type="number" name="book[${index}][year]" required placeholder="2024" min="2000" max="2030">
            </div>
            
            <div class="form-group">
                <label>ISBN</label>
                <input type="text" name="book[${index}][isbn]" placeholder="978-xxx-xxx-xxx-x">
            </div>
            
            <div class="form-group">
                <label>Số trang</label>
                <input type="number" name="book[${index}][pages]" placeholder="0" min="0">
            </div>
            
            <div class="form-group">
                <label>Đồng tác giả</label>
                <input type="text" name="book[${index}][co_authors]" placeholder="Danh sách đồng tác giả">
            </div>
        </div>
    `;
    
    container.appendChild(newCard);
});
</script>