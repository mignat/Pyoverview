$(function () {
    $('[data-toggle="popover"]').popover();
    $("#viewModal").on("shown.bs.modal", function(e) {
        let device = $(e.relatedTarget).data('device');
        $(".modal-title").text("Viewing station: "+device)
        $(".modal-body").load("/templates/Dashboard/dashboard-ui-device-view.php?device=" + device);
    });
});