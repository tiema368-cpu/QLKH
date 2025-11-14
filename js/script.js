// Xử lý form và tương tác
document.addEventListener('DOMContentLoaded', function() {
    // Xử lý loading state khi submit form
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<div class="spinner"></div> Đang lưu...';
                
                // Simulate saving process
                setTimeout(() => {
                    submitBtn.innerHTML = '<i class="ri-check-line"></i> Đã lưu thành công';
                    submitBtn.style.background = '#27ae60';
                    
                    setTimeout(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = '<i class="ri-save-line"></i> Lưu thông tin';
                        submitBtn.style.background = '';
                    }, 3000);
                }, 2000);
            }
        });
    });

    // Xử lý dynamic form fields
    const addButtons = document.querySelectorAll('.add-btn');
    addButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const container = this.closest('.tab-content').querySelector('[id$="Container"]');
            if (container && container.children.length < 10) {
                // Logic thêm form field sẽ được xử lý trong từng file form
            } else {
                alert('Tối đa 10 mục được phép thêm');
            }
        });
    });

    // Xử lý faculty selection
    const facultySelect = document.querySelector('select[name="faculty"]');
    const departmentInput = document.querySelector('input[name="department"]');
    
    if (facultySelect && departmentInput) {
        facultySelect.addEventListener('change', function() {
            const faculty = this.value;
            let departmentPlaceholder = 'Vui lòng chọn khoa trước';
            
            switch(faculty) {
                case 'cntt':
                    departmentPlaceholder = 'Ví dụ: Bộ môn Kỹ thuật phần mềm';
                    break;
                case 'kinhte':
                    departmentPlaceholder = 'Ví dụ: Bộ môn Quản trị kinh doanh';
                    break;
                case 'ngoaingu':
                    departmentPlaceholder = 'Ví dụ: Bộ môn Tiếng Anh';
                    break;
            }
            
            departmentInput.placeholder = departmentPlaceholder;
        });
    }
});

// Utility functions
function showSuccess(message) {
    // Hiển thị thông báo thành công
    const successDiv = document.createElement('div');
    successDiv.className = 'success-message';
    successDiv.innerHTML = `<i class="ri-check-line"></i> ${message}`;
    successDiv.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #27ae60;
        color: white;
        padding: 15px 20px;
        border-radius: 6px;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `;
    
    document.body.appendChild(successDiv);
    
    setTimeout(() => {
        successDiv.remove();
    }, 3000);
}

function showError(message) {
    // Hiển thị thông báo lỗi
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.innerHTML = `<i class="ri-error-warning-line"></i> ${message}`;
    errorDiv.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #e74c3c;
        color: white;
        padding: 15px 20px;
        border-radius: 6px;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `;
    
    document.body.appendChild(errorDiv);
    
    setTimeout(() => {
        errorDiv.remove();
    }, 3000);
}
