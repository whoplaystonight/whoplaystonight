function paint(dataString) {
    $("#resultMessage").html("<div class='alert alert-success'>"+dataString+"</div>").fadeIn("slow");

    setTimeout(function () {
        $("#resultMessage").fadeOut("slow")
    }, 5000);

    //reset the form
    $('#restore_form')[0].reset();

    // hide ajax loader icon
    $('.ajaxLoader').fadeOut("fast");

    // Enable button after processing
    $('#restoreBtn').attr('disabled', false);

    $url = amigable('?module=main/');
    setTimeout(function () {
        window.location.href = $url;
    }, 3000);
}

$(document).ready(function () {
    // disable submit button in case of disabled javascript browsers
    $(function () {
        $('#restoreBtn').attr('disabled', false);
    });

    $("#restore_form").validate({
        rules: {
            inputEmail: {
                required: true,
                email: true
            }
        },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('errorr');
        },
        success: function (element) {
            $(element).closest('.control-group').removeClass('errorr').addClass('success');
            $(element).closest('.control-group').find('label').remove();
        },
        errorClass: "help-inline"
    });

    $("#restore_form").submit(function () {
        if ($("#restore_form").valid()) {

            // Disable button while processing
            $('#restoreBtn').attr('disabled', true);

            // show ajax loader icon
            $('.ajaxLoader').fadeIn("fast");

            var dataString = $("#restore_form").serialize();

            $.ajax({
                type: "POST",
                url: amigable("?module=users&function=process_restore"),
                data: dataString,
                success: function (dataString) {
                    paint(dataString);
                }
            })
            .fail(function () {
                paint("<div class='alert alert-error'>Error en el servidor. Intentelo más tarde...</div>");
            });
        }
        return false;
    });
});
