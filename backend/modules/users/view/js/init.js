$(document).ready(function () {
    /////**modal login*///
    var modalbase = '<div class="modal fade" id="modalLog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
            '<div class="modal-dialog" role="document">' +
            '<div class="modal-content">' +
            '</div>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<div class="8u 12u$(medium)">' +
            '<div class="copyright">' +
            '&copy; 2016 JoinElderly. All rights reserved.' +
            ' </div>' +
            '</div>' +
            '</div>' +
            '</div>';
    $("#LoginModal").append(modalbase);
    $("#Events").hide()
    ////**user menu*///
    var user = Tools.readCookie("user");
    if (user) {
        user = user.split("|");
        $("#LogProf").html("<a href=" + amigable('?module=user&function=profile') + "><img id='menuImg' class='icon rounded' src='" + user[1] + "'/>" + user[3] + "</a>");
        $("#LogProf").after("<li><a id='logout' href='#' >Log Out</a></li>");
        $("#SignUp").hide();
        if ( (user[2] === "worker") || (user[2] === "client")  ) {
            //$("#LogProf").before("<li><a href=" + amigable('?module=ofertas') + ">Mis ofertas</a></li>")
        } else if (user[2] === "admin") {
            //$("#LogProf").before("<li><a href=" + amigable('?module=products&function=events_form') + ">Events</a></li>")
            $("#Events").show()
        }
        $("head").append("<script src='https://localhost/whoplaystonight/modules/users/view/js/logout.js'></script>");
    }

    var url = window.location.href;
    url = url.split("/");
    if (url[6] === "verify" && url[7].substring(0, 3) == "Ver"){
        $("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Su email ha sido verificado, disfrute de nuestros servicios</div>");
    }else if(url[7]==="503"){
         $("#alertbanner").html("<a href='#alertbanner' class='alertbanner alertbannerErr'>Hay un problema en la base de datos, inténtelo más tarde</div>");
    }else if (url[6] === "begin") {
        if (url[7] === "reg"){
            $("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Se le ha enviado un email para verificar su cuenta</div>");
        }else if (url[7] === "rest"){
            $("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Se ha cambiado satisfactoriamente su contraseña</div>");
        }
    } else if (url[6] === "profile"){
        if (url[7] === "done")
            $("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Usuario correctamente actualizado</div>");
    }
});
