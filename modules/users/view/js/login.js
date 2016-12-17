$(document).ready(function () {
    // $("#twlogin").click(function () {
    //     loginTw();
    // });
    console.log("hi");
    $("#submitLog").click(function () {
        login();
    });

    $("#inputUser").keyup(function () {
        if ($(this).val().length != "") {
            $(".error").fadeOut();
            return false;
        }
    });
    $("#inputPass").keyup(function () {
        if ($(this).val().length != "") {
            $(".error").fadeOut();
            return false;
        }
    });

});

function login() {
    console.log("click")
    var user = $("#inputUser").val();
    var pass = $("#inputPass").val();
    var value = false;

    $(".error").remove();
    if (!user) {
        $("#inputUser").focus().after("<span class='error'>Empty username</span>");
        value = false;
    } else {
        if (!pass) {
            $("#inputPass").focus().after("<span class='error'>Empty password</span>");
            value = false;
        } else
            value = true;
    }

    var data = {"usuario": user, "pass": pass};
    var login_JSON = JSON.stringify(data);
    if (value){
        console.log(amigable('?module=users&function=login'));
        $.post(amigable("?module=users&function=login"), {login_json: login_JSON},
        function (response) {
            console.log(response);
            if (!response.error) {
                //create session cookies
                Tools.createCookie("user", response[0]['usuario'] + "|" + response[0]['avatar'] + "|" + response[0]['tipo'] + "|" + response[0]['nombre'], 1);
                window.location.href = amigable("?module=main");
            } else {
                if (response.datos == 503)
                    window.location.href = amigable("?module=main&fn=begin&param=503");
                else
                    $("#inputPass").focus().after("<span class='error'>" + response.datos + "</span>");
            }
        }, "json").fail(function (xhr, textStatus, errorThrown) {
            console.log(xhr.responseText);
            if (xhr.status === 0) {
                alert('Not connect: Verify Network.');
            } else if (xhr.status === 404) {
                alert('Requested page not found [404]');
            } else if (xhr.status === 500) {
                alert('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                alert('Time out error.');
            } else if (textStatus === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error: ' + xhr.responseText);
            }
        });
    }
}
