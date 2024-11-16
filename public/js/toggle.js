    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Lấy file người dùng chọn
        if (file) {
            const reader = new FileReader(); // Tạo đối tượng FileReader để đọc file
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                preview.src = e.target.result; // Gán dữ liệu ảnh vào src của thẻ <img>
                preview.style.display = 'block'; // Hiển thị ảnh
            };
            reader.readAsDataURL(file); // Đọc file dưới dạng Data URL
        }
    });
    const input = document.getElementById('image');
    const preview = document.getElementById('preview');
    const clearBtn = document.getElementById('clearPreview');

    clearBtn.addEventListener('click', function () {
        input.value = ''; // Xóa giá trị input file
        preview.style.display = 'none'; // Ẩn ảnh
        clearBtn.style.display = 'none'; // Ẩn nút xóa
    });

    input.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                clearBtn.style.display = 'inline-block'; // Hiển thị nút xóa
            };
            reader.readAsDataURL(file);
        }
    });
