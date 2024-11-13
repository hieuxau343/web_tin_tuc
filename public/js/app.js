$(function () {
    let currentCategoryId = null;

    $(".btn-edit").click(function (event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định (tránh reload trang)

        var categoryId = $(this).data("id"); // Lấy ID danh mục từ thuộc tính data-id của nút

        // Gửi yêu cầu Ajax để lấy dữ liệu và điền vào form
        sendAjaxRequest(
            "/category/" + categoryId + "/edit", // Đúng với cấu trúc URL của route edit
            "GET",
            {},
            function (response) {
                // Điền dữ liệu vào modal
                $("#editName").val(response.name);
                $("#editSlug").val(response.slug);
                $("#editId").val(response.id);

                // Hiển thị modal
                $("#editModal").modal("show");
            },
            function (error) {
                console.log("Lỗi khi lấy dữ liệu danh mục:", error);
            }
        );
    });

    $(".btn-save").click(function (event) {
        event.preventDefault();
        var categoryId = $("#editId").val(); // Lấy ID từ trường ẩn
        var formData = {
            name: $("#editName").val(),
            slug: $("#editSlug").val(),
        };

        // Sử dụng template string đúng cú pháp và gọi Ajax
        sendAjaxRequest(
            "/category/" + categoryId, // Đảm bảo URL đúng
            "PUT", // Phương thức PUT
            formData, // Dữ liệu cần gửi
            function (response) {
                // Đóng modal sau khi lưu
                $("#editModal").modal("hide");
                alert("Danh mục đã được cập nhật thành công!");
                console.log(response.created_at);

                // Cập nhật dữ liệu trên trang nếu cần thiết
                $("#categoryName").text(response.name);
                $("#categorySlug").text(response.slug);
                $("#categoryUpdate").text(response.updated_at);
            },
            function (error) {
                console.log("Lỗi khi cập nhật danh mục:", error);
                alert("Cập nhật thất bại, vui lòng thử lại.");
                console.log(error.responseText); // In ra nội dung lỗi từ server
                console.log(error.status);
            }
        );
    });

    $(".btn-delete").click(function (event) {
        event.preventDefault();
        var categoryId = $(this).data("id");
        $(".btn-confirm").attr("data-id", categoryId);
        $("#confirmationModal").modal("show");
    });

    $(".btn-confirm").click(function () {
        var categoryId = $(this).attr("data-id");
        sendAjaxRequest(
            "/category/" + categoryId,
            "DELETE",
            null,
            function (response) {
                if (response.success) {
                    // Ẩn modal sau khi xóa thành công
                    $("#confirmationModal").modal("hide");
                    alert(response.message);
                    // Cập nhật giao diện sau khi xóa (ví dụ, xóa dòng khỏi bảng)
                    $("#row-" + categoryId).remove();
                } else {
                    alert("Xóa thất bại!");
                }
            },
            function (xhr) {
                // Xử lý lỗi khi có lỗi trong AJAX
                console.log("Lỗi khi cập nhật danh mục:", xhr);
                alert("Cập nhật thất bại, vui lòng thử lại.");
                console.log(xhr.responseText); // In ra nội dung lỗi từ server
                console.log(xhr.status); // In ra mã trạng thái HTTP
            }
        );
    });
});
