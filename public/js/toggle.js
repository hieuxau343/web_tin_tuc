const input = document.getElementById("image");
const preview = document.getElementById("preview");
const clearBtn = document.getElementById("clearPreview");
const previewContainer = document.getElementById("previewContainer");

// Xử lý khi người dùng chọn ảnh mới
input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result; // Gán dữ liệu ảnh vào thẻ <img>
            preview.style.display = "block"; // Hiển thị ảnh
            previewContainer.style.display = "block"; // Hiển thị container
            clearBtn.style.display = "inline-block"; // Hiển thị nút xóa
        };
        reader.readAsDataURL(file); // Đọc file dưới dạng Data URL
    } else {
        preview.style.display = "none";
        previewContainer.style.display = "none";
    }
});

// Xử lý khi người dùng nhấn nút "Xóa ảnh"
clearBtn.addEventListener("click", function () {
    input.value = ""; // Xóa giá trị của input file
    preview.src = "#"; // Đặt lại src mặc định cho ảnh
    preview.style.display = "none"; // Ẩn ảnh
    previewContainer.style.display = "none"; // Ẩn khung chứa
});
