$(function () {
    const pathname = window.location.pathname;
    const pathSegments = pathname.split("/");
    const entity = pathSegments[1];

    // NUT SUA
    $(".btn-edit").click(function (event) {
        event.preventDefault();

        var id = $(this).data("id");

        sendAjaxRequest(
            `/${entity}/${id}/edit`,
            "GET",
            {},
            function (response) {
                if (entity === "category") {
                    $("#editName").val(response.name);
                    $("#editSlug").val(response.slug);
                    $("#editId").val(response.id);
                } else if (entity === "account") {
                    $("#editName").val(response.fullname);
                    $("#editPhone").val(response.phone);
                    $("#editEmail").val(response.email);
                    $("#editRole").val(response.role);
                    $("#editDateOfBirth").val(response.birthday);
                    $("#editId").val(response.id);

                    if (response.gender === "Nam") {
                        $("#male").prop("checked", true);
                    } else if (response.gender === "Nữ") {
                        $("#female").prop("checked", true);
                    }
                }

                $("#editModal").modal("show");
            },
            function (error) {
                console.log("Lỗi khi lấy dữ liệu danh mục:", error);
            }
        );
    });

    // Nut save model
    $(".btn-save").click(function (event) {
        event.preventDefault();
        var id = $("#editId").val();
        var formData = getFormData(entity);
        console.log(formData);
        sendAjaxRequest(
            `/${entity}/${id}`,
            "PUT",
            formData,
            function (response) {
                $("#editModal").modal("hide");
                alert("Danh mục đã được cập nhật thành công!");

                updateRow(entity, response);
            },
            function (error) {
                console.log("Lỗi khi cập nhật danh mục:", error);
                alert("Cập nhật thất bại, vui lòng thử lại.");
                console.log(error.responseText); // In ra nội dung lỗi từ server
                console.log(error.status);
            }
        );
    });

    //NUT XOA
    $(".btn-delete").click(function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        $(".btn-confirm").attr("data-id", id);
        $("#confirmationModal").modal("show");
    });

    // XAC NHAN XOA
    $(".btn-confirm").click(function () {
        var id = $(this).attr("data-id");
        sendAjaxRequest(
            `/${entity}/` + id,
            "DELETE",
            null,
            function (response) {
                if (response.success) {
                    // Ẩn modal sau khi xóa thành công
                    $("#confirmationModal").modal("hide");
                    alert(response.message);
                    // Cập nhật giao diện sau khi xóa (ví dụ, xóa dòng khỏi bảng)
                    $("#row-" + id).remove();
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

// form getData
function getFormData(entity) {
    const formData = {};

    if (entity === "category") {
        formData.name = $("#editName").val();
        formData.slug = $("#editSlug").val();
    } else if (entity === "account") {
        formData.name = $("#editName").val();
        formData.phone = $("#editPhone").val();
        formData.email = $("#editEmail").val();
        formData.role = $("#editRole").val();
        formData.birthday = $("#editDateOfBirth").val();
        formData.gender = $("input[name='gender']:checked").val();
    } else if (entity === "advertisement") {
        formData.title = $("#editTitle").val();
        formData.content = $("#editContent").val();
        formData.startDate = $("#editStartDate").val();
        formData.endDate = $("#editEndDate").val();
    } else if (entity === "posts") {
        formData.title = $("#editTitle").val();
        formData.content = $("#editContent").val();
        formData.author = $("#editAuthor").val();
    }

    return formData;
}

function updateRow(entity, response) {
    var row = $(`#row-${response.id}`); // Lấy dòng dựa trên ID của entity từ response
    if (entity === "category") {
        row.find(".categoryName").text(response.name);
        row.find(".categorySlug").text(response.slug);
        row.find(".categoryUpdate").text(response.updated_at);
    } else if (entity === "account") {
        row.find(".accountName").text(response.fullname);
        row.find(".accountPhone").text(response.phone);
        row.find(".accountEmail").text(response.email);
        row.find(".accountRole").text(response.role);
        row.find(".accountGender").text(response.gender);
        row.find(".accountBirth").text(response.birthday);
    }
    // Thêm các điều kiện khác nếu có các entity khác như advertisement, posts
}
