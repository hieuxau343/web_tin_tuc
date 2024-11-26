$(function () {
    const pathname = window.location.pathname;
    const pathSegments = pathname.split("/");
    const entity = pathSegments[2];
    const adminPrefix = "/admin"; // Lưu trữ tiền tố "admin"

    console.log(entity);

    // NUT SUA
    $(".btn-edit").click(function (event) {
        event.preventDefault();
        var id = $(this).data("id");

        sendAjaxRequest(
            `${adminPrefix}/${entity}/${id}/edit`,
            "GET",
            {},
            function (response) {
                fillModel(entity, response);
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
            `${adminPrefix}/${entity}/${id}`,
            "PUT",
            formData,
            function (response) {
                $("#editModal").modal("hide");
                console.log(response);
                updateRow(entity, response);
                toastr.success("Cập nhật thành công");
            },
            function (error) {
                toastr.error("Cập nhật thất bại");
            }
        );
    });

    //BUTTON XOA
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
            `${adminPrefix}/${entity}/` + id,
            "DELETE",
            null,
            function (response) {
                $("#confirmationModal").modal("hide");
                $("#row-" + id).remove();
                toastr.success("Xóa thành công");
            },
            function (xhr) {
                toastr.error("Xóa thất bại");
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
    } else if (entity === "user") {
        formData.name = $("#editName").val();
        formData.phone = $("#editPhone").val();
        formData.email = $("#editEmail").val();
        formData.role = $("#editRole").val();
        formData.birthday = $("#editDateOfBirth").val();
        formData.gender = $("input[name='gender']:checked").val();
    }

    return formData;
}

function updateRow(entity, response) {
    var row = $(`#row-${response.id}`); // Lấy dòng dựa trên ID của entity từ response
    if (entity === "category") {
        row.find(".categoryName").text(response.name);
        row.find(".categorySlug").text(response.slug);
        row.find(".categoryUpdate").text(response.updated_at);
    } else if (entity === "user") {
        row.find(".userName").text(response.name);
        row.find(".userPhone").text(response.phone);
        row.find(".userEmail").text(response.email);
        row.find(".userRole").text(response.role);
        row.find(".userGender").text(response.gender);
        row.find(".userBirth").text(response.birthday);
    }
}

function fillModel(entity, response) {
    if (entity === "category") {
        $("#editName").val(response.name);
        $("#editSlug").val(response.slug);
        $("#editId").val(response.id);
    } else if (entity === "user") {
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
}
