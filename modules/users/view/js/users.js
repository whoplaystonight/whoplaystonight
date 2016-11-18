$(document).ready(function() {
    $(function() {
        $("#birthday").datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true,
            yearRange: '1920:2010'
        });
    });

    $(this).fill_or_clean();

});

jQuery.fn.fill_or_clean = function() {
    this.each(function() {
        if ($("#username").val() === "") { //cambiar la forma a val
            $("#username").val("Introduce username");
            $("#username").focus(function() {
                if ($("#username").val() === "Introduce username") {
                    $("#username").val("");
                }
            });
        }
        $("#username").blur(function() { //Onblur se activa cuando el usuario retira el foco
            if ($("#username").val() === "") {
                $("#username").val("Introduce username");
            }
        });

        if ($("#email").val() === "") {
            $("#email").val("Introduce your email");
            $("#email").focus(function() {
                if ($("#email").val() === "Introduce your email") {
                    $("#email").val("");
                }
            });
        }
        $("#email").blur(function() {
            if ($("#email").val() === "") {
                $("#email").val("Introduce your email");
            }
        });

        if ($("#password").val() === "") {
            $("#password").val("Set up your password");
            $("#password").focus(function() {
                if ($("#password").val() === "Set up your password") {
                    $("#password").val("");
                }
            });
        }
        $("#password").blur(function() {
            if ($("#password").val() === "") {
                $("#password").val("Set up your password");
            }
        });

        if ($("#birthday").val() === "") {
            $("#birthday").val("Introduce your birthday");
            $("#birthday").focus(function() {
                if ($("#birthday").val() === "Introduce your birthday") {
                    $("#birthday").val("");
                }
            });
        }
        $("#birthday").blur(function() {
            if ($("#birthday").val() === "") {
                $("#birthday").val("Introduce entering date");
            }
        });

    });
    return this;

};
