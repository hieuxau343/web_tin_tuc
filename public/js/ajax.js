function sendAjaxRequest(url, type, data, successCallback, errorCallback) {
    $.ajax({
        url: url,
        type: type,
        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            successCallback(response);
        },  
    });
}
