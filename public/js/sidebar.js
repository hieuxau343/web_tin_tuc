$(function () {
    $(".info-user").click(function (e) {
        $(".list-group").stop(true, true).slideToggle();
        e.stopPropagation();
    });

    $(document).click(function () {
        $(".list-group").slideUp();
    });

    $(".list-group").click(function (e) {
        e.stopPropagation();
    });
});
