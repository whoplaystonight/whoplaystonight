/* To fix Uncaugh Error: Dropzone already attached*/
Dropzone.autoDiscover=false;
$(document).ready(function() {
    var user = Tools.readCookie("user");

    if (user) {
        user = user.split("|");
        $.post(amigable('?module=users&function=profile_filler'), {usuario: user[0]},
        function (response) {
            console.log(response);
            if (response.success) {
                fill(response.user);
                // load_countries_v1(response.user['pais']);
                // if (response.user['pais'] === "ES") {
                //     $("#provincia").prop('disabled', false);
                //     $("#poblacion").prop('disabled', false);
                //     load_provincias_v1(response.user['provincia']);
                //     load_poblaciones_v1(response.user['provincia'], response.user['poblacion']);
                // }
            } else {
                window.location.href = response.redirect;
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
    }else{
        alert('Please log in');
    }

    $('#change_data').click(function () {
        validate_modify_user();
    });

    $(function() {
        $("#birthday").datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true,
            yearRange: '1920:2010'
        });
    });

    $(this).fill_or_clean();

    //Valida users
    $("#submit_user").click(function() {
        validate_user();
    });


    //Dropzone function //////////////////////////////////
    // $("#dropzone").dropzone({
    //     //url: "modules/users/controller/controller_users.class.php?upload=true",
    //     url: amigable("?module=users&function=upload_user_avatar"),
    //     params:{'upload':true},
    //     addRemoveLinks: true,
    //     maxFileSize: 1000,
    //     dictResponseError: "Ha ocurrido un error en el server",
    //     acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
    //     init: function() {
    //       //console.log("estic dins del upload");
    //         this.on("success", function(file, response) {
    //             //alert(response);
    //             //console.log(response);
    //             $("#progress").show();
    //             $("#bar").width('100%');
    //             $("#percent").html('100%');
    //             $('.msg').text('').removeClass('msg_error');
    //             $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({
    //                 'right': '300px'
    //             }, 300);
    //         });
    //     },
    //     complete: function(file) {
    //         //if(file.status == "success"){
    //         //alert("El archivo se ha subido correctamente: " + file.name);
    //         //}
    //     },
    //     error: function(file) {
    //         //alert("Error subiendo el archivo " + file.name);
    //     },
    //     removedfile: function(file, serverFileName) {
    //         var name = file.name;
    //         $.ajax({
    //             type: "POST",
    //             // url: "modules/users/controller/controller_users.class.php?delete=true",
    //             url: amigable("?module=users&function=delete_user_avatar&delete=true"),
    //             data: "filename=" + name,
    //             success: function(data) {
    //                 //console.log("eliminar");
    //                 $("#progress").hide();
    //                 $('.msg').text('').removeClass('msg_ok');
    //                 $('.msg').text('').removeClass('msg_error');
    //                 $("#e_avatar").html("");
    //
    //                 var json = JSON.parse(data);
    //                 if (json.res === true) {
    //                     var element;
    //                     if ((element = file.previewElement) !== null) {
    //                         element.parentNode.removeChild(file.previewElement);
    //                         //alert("Imagen eliminada: " + name);
    //                         //console.log("dentro2");
    //                     } else {
    //                         false;
    //                     }
    //                 } else { //json.res == false, elimino la imagen también
    //                     var element;
    //                     if ((element = file.previewElement) !== null) {
    //                         element.parentNode.removeChild(file.previewElement);
    //                     } else {
    //                         false;
    //                     }
    //                 }
    //             }
    //         });
    //     }
    // });
    // // End dropzone

    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/]((175[7-9])|(17[6-9][0-9])|(1[8-9][0-9][0-9])|([2-9][0-9][0-9][0-9]))/i;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var longstring_reg = /^[A-Za-z]{2,300}$/;
    var usr_reg = /^[0-9a-zA-Z]{2,20}$/;
    var number_reg = /^\d+$/;

    $("#username").keyup(function() {
        if ($(this).val() !== "" && string_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#email").keyup(function() {
        if ($(this).val() !== "" && email_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#birthday").keyup(function() {
        if ($(this).val() !== "" && date_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    // 3 combobox
    // load_countries_v1();
    // $("#provincia").empty();
    // $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');
    // $("#provincia").prop('disabled', true);
    // $("#poblacion").empty();
    // $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');
    // $("#poblacion").prop('disabled', true);
    //
    // $("#pais").change(function() {
    //     var pais = $(this).val();
    //     var provincia = $("#provincia");
    //     var poblacion = $("#poblacion");
    //
    //     if(pais !== 'ES'){
    //         provincia.prop('disabled', true);
    //         poblacion.prop('disabled', true);
    //         $("#provincia").empty();
    //         $("#poblacion").empty();
    //     }else{
    //         provincia.prop('disabled', false);
    //         poblacion.prop('disabled', false);
    //         load_provincias_v1();
    //     }
    // });
    //
    // $("#provincia").change(function() {
    //     var prov = $(this).val();
    //     if(prov > 0){
    //         load_poblaciones_v1(prov);
    //     }else{
    //         $("#poblacion").prop('disabled', false);
    //     }
    // });

});

function fill(user) {
    $("#name").append(user['username']);
    $("#username").val(user['username']);
    $("#email").val(user['email']);
    $("#birthday").val(user['birthday']);
    if(user['rock'] == 1){
        $('#rock').attr('checked', true);
    } else {
        $('#rock').attr('checked', false);
    }
    if(user['jazz'] == 1){
        $('#jazz').attr('checked', true);
    } else {
        $('#jazz').attr('checked', false);
    }
    if(user['blues'] == 1){
        $('#blues').attr('checked', true);
    } else {
        $('#blues').attr('checked', false);
    }
}

function validate_modify_user() {
    console.log("Modify");
    var result = true;

    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var birthday = document.getElementById("birthday").value;
    var rock = document.getElementById("rock").checked;
    var jazz = document.getElementById("jazz").checked;
    var blues = document.getElementById("blues").checked;

    // var pais = document.getElementById("pais").value;
    // var provincia = document.getElementById("provincia").value;
    // var poblacion = document.getElementById("poblacion").value;
    // console.log(username + email + password + birthday + interests + pais + provincia + poblacion);
    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/]((175[7-9])|(17[6-9][0-9])|(1[8-9][0-9][0-9])|([2-9][0-9][0-9][0-9]))/i;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var longstring_reg = /^[A-Za-z]{2,300}$/;
    var usr_reg = /^[0-9a-zA-Z]{2,20}$/;
    var number_reg = /^\d+$/;

    $(".error").remove();
    if ($("#username").val() === "" || $("#username").val() == "Introduce username") {
        $("#username").focus().after("<span class='error'>Introduce username</span>");
        result = false;
        return false;
    } else if (!string_reg.test($("#username").val())) {
        $("#username").focus().after("<span class='error'>Name must be 2 to 30 letters</span>");
        result = false;
        return false;
    }

    if ($("#email").val() === "") {
        $("#email").focus().after("<span class='error'>Introduce your email</span>");
        result = false;
        return false;
    } else if (!email_reg.test($("#email").val())) {
        $("#email").focus().after("<span class='error'>Your eamil must be valid</span>");
        result = false;
        return false;
    }

    if ($("#birthday").val() === "" || $("#birthday").val() == "Introduce your birthday") {
        $("#birthday").focus().after("<span class='error'>Introduce your birthday</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#birthday").val())) {
        $("#birthday").focus().after("<span class='error'>Your birthday is incorrect</span>");
        result = false;
        return false;
    }

    // if ($("#pais").val() === "" || $("#pais").val() == "Selecciona un Pais") {
    //     $("#pais").focus().after("<span class='error'>Introduce pais</span>");
    //     result = false;
    //     return false;
    // }
    //
    // if ($("#provincia").val() === "" || $("#provincia").val() == "Selecciona una Provincia") {
    //     if ($("#pais").val() == "ES"){
    //         $("#provincia").focus().after("<span class='error'>Introduce provincia</span>");
    //         result = false;
    //         return false;
    //     } else {
    //         $("#provincia").val("default_provincia");
    //     }
    // }
    //
    // if ($("#poblacion").val() === "" || $("#poblacion").val() == "Selecciona una Poblacion") {
    //     if ($("#pais").val() == "ES"){
    //         $("#poblacion").focus().after("<span class='error'>Introduce poblacion</span>");
    //         result = false;
    //         return false;
    //     } else {
    //         $("#poblacion").val("default_poblacion");
    //     }
    // }

    if (result) {
        console.log("Validated by JS")
        // if (provincia == null) {
        //     provincia = '';
        // } else if (provincia.length == 0) {
        //     provincia = '';
        // } else if (provincia === 'Selecciona una Provincia') {
        //     return '';
        // }
        //
        // if (poblacion == null) {
        //     poblacion = '';
        // } else if (poblacion.length == 0) {
        //     poblacion = '';
        // } else if (poblacion === 'Selecciona una Poblacion') {
        //     return '';
        // }
        //
        var data = {"username": username, "email": email, "birthday": birthday, "rock": rock, "jazz": jazz, "blues": blues};
        var data_users_JSON = JSON.stringify(data);
        console.log(data_users_JSON)
        $.post(amigable('?module=users&function=modify'), {mod_user_json: data_users_JSON},
        function (response) {
            // if (response.success) {
            //     window.location.href = response.redirect;
            // }
            window.location.href = "?module=users&function=profile";
            // } else {
            //     if (response.redirect) {
            //         window.location.href = response.redirect;
            //     }
                // if (response["datos"]["nombre"] !== undefined && response["datos"]["nombre"] !== null) {
                //     $("#inputName").focus().after("<span class='error'>" + response["datos"]["nombre"] + "</span>");
                // }
                // if (response["datos"]["apellidos"] !== undefined && response["datos"]["apellidos"] !== null) {
                //     $("#inputSurn").focus().after("<span class='error'>" + response["datos"]["apellidos"] + "</span>");
                // }
                // if (response["datos"]["password"] !== undefined && response["datos"]["password"] !== null) {
                //     $("#inputPass").focus().after("<span class='error'>" + response.error.password + "</span>");
                // }
                // if (response["datos"]["date_birthday"] !== undefined && response["datos"]["date_birthday"] !== null) {
                //     $("#inputBirth").focus().after("<span class='error'>" + response["datos"]["date_birthday"] + "</span>");
                // }
                // if (response["datos"]["bank"] !== undefined && response["datos"]["bank"] !== null) {
                //     $("#inputBank").focus().after("<span class='error'>" + response["datos"]["bank"] + "</span>");
                // }
                // if (response["datos"]["dni"] !== undefined && response["datos"]["dni"] !== null) {
                //     $("#inputDni").focus().after("<span class='error'>" + response["datos"]["dni"] + "</span>");
                // }
                // if (response["datos"]["pais"] !== undefined && response["datos"]["pais"] !== null) {
                //     $("#pais").focus().after("<span class='error'>" + response["datos"]["pais"] + "</span>");
                // }
                // if (response["datos"]["provincia"] !== undefined && response["datos"]["provincia"] !== null) {
                //     $("#provincia").focus().after("<span class='error'>" + response["datos"]["provincia"] + "</span>");
                // }
                // if (response["datos"]["poblacion"] !== undefined && response["datos"]["poblacion"] !== null) {
                //     $("#poblacion").focus().after("<span class='error'>" + response["datos"]["poblacion"] + "</span>");
                // }
            // }
        }/*, "json"*/).fail(function (xhr, textStatus, errorThrown) {
            if (xhr.responseJSON === undefined || xhr.responseJSON === null)
                xhr.responseJSON = JSON.parse(xhr.responseText);
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

function validate_user() {
    var result = true;

    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var birthday = document.getElementById("birthday").value;
    var user_interests = document.getElementsByClassName("messageCheckbox");
    var interests = [];
    var j = 0;
    for (var i = 0; i < user_interests.length; i++) {
        if (user_interests[i].checked) {
            interests[j] = user_interests[i].value;
            j++;
        }
    }

    var pais = document.getElementById("pais").value;
    var provincia = document.getElementById("provincia").value;
    var poblacion = document.getElementById("poblacion").value;
    // console.log(username + email + password + birthday + interests + pais + provincia + poblacion);
    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/]((175[7-9])|(17[6-9][0-9])|(1[8-9][0-9][0-9])|([2-9][0-9][0-9][0-9]))/i;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var longstring_reg = /^[A-Za-z]{2,300}$/;
    var usr_reg = /^[0-9a-zA-Z]{2,20}$/;
    var number_reg = /^\d+$/;

    $(".error").remove();
    if ($("#username").val() === "" || $("#username").val() == "Introduce username") {
        $("#username").focus().after("<span class='error'>Introduce username</span>");
        result = false;
        return false;
    } else if (!string_reg.test($("#username").val())) {
        $("#username").focus().after("<span class='error'>Name must be 2 to 30 letters</span>");
        result = false;
        return false;
    }

    if ($("#email").val() === "") {
        $("#email").focus().after("<span class='error'>Introduce your email</span>");
        result = false;
        return false;
    } else if (!email_reg.test($("#email").val())) {
        $("#email").focus().after("<span class='error'>Your eamil must be valid</span>");
        result = false;
        return false;
    }

    if ($("#password").val() === "" || $("#password").val() == "Set up your password") {
        $("#password").focus().after("<span class='error'>Introduce your password</span>");
        result = false;
        return false;
    } else if (!pass_reg.test($("#password").val())) {
        $("#password").focus().after("<span class='error'>Your password must have between 6 and 32 chars</span>");
        result = false;
        return false;
    }

    if ($("#birthday").val() === "" || $("#birthday").val() == "Introduce your birthday") {
        $("#birthday").focus().after("<span class='error'>Introduce your birthday</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#birthday").val())) {
        $("#birthday").focus().after("<span class='error'>Your birthday is incorrect</span>");
        result = false;
        return false;
    }

    if ($("#pais").val() === "" || $("#pais").val() == "Selecciona un Pais") {
        $("#pais").focus().after("<span class='error'>Introduce pais</span>");
        result = false;
        return false;
    }

    if ($("#provincia").val() === "" || $("#provincia").val() == "Selecciona una Provincia") {
        if ($("#pais").val() == "ES"){
            $("#provincia").focus().after("<span class='error'>Introduce provincia</span>");
            result = false;
            return false;
        } else {
            $("#provincia").val("default_provincia");
        }
    }

    if ($("#poblacion").val() === "" || $("#poblacion").val() == "Selecciona una Poblacion") {
        if ($("#pais").val() == "ES"){
            $("#poblacion").focus().after("<span class='error'>Introduce poblacion</span>");
            result = false;
            return false;
        } else {
            $("#poblacion").val("default_poblacion");
        }
    }

    // Si ha ido todo bien, se envian los datos al servidor
    if (result) {
        var data = {
            "username": username,
            "email": email,
            "password": password,
            "birthday": birthday,
            "interests": interests,
            "country": pais,
            "province": provincia,
            "town": poblacion
        };

        var data_users_JSON = JSON.stringify(data);

        // $.post('modules/users/controller/controller_users.class.php', {
        //     alta_users_json: data_users_JSON
        // },
        // $.post('index.php?module=users&function=alta_users&alta_users=true',{
        //     alta_users_json: data_users_JSON
        // },
        //$.post('../../users/alta_users/', { alta_users_json: data_users_JSON},
        $.post(amigable("?module=users&function=alta_users"), { alta_users_json: data_users_JSON},
        function(response) {
            //console.log(typeof(response));
            //var responseObj = JSON.parse(response); //I convert the string to a object!
            //console.log(response);
            // console.log(response.success);
            if (response.success) {
                alert("Thanks for signing up!");
                //remove_data()
                window.location.href = response.redirect;
            }

        }, "json").fail(function(xhr) {
            console.log(xhr);

            if (xhr.responseJSON.error.username)
            $("#username").focus().after("<span  class='error1'>" + xhr.responseJSON.error.username + "</span>");

            if (xhr.responseJSON.error.email)
            $("#email").focus().after("<span  class='error1'>" + xhr.responseJSON.error.email + "</span>");

            if (xhr.responseJSON.error.password)
            $("#password").focus().after("<span  class='error1'>" + xhr.responseJSON.error.password + "</span>");

            if (xhr.responseJSON.error.birthday)
            $("#birthday").focus().after("<span  class='error1'>" + xhr.responseJSON.error.birthday + "</span>");

            if (xhr.responseJSON.error.interests)
            $("#interests").focus().after("<span  class='error1'>" + xhr.responseJSON.error.interests + "</span>");

            if (xhr.responseJSON.error_avatar)
            $("#dropzone").focus().after("<span  class='error1'>" + xhr.responseJSON.error_avatar + "</span>");

            if (xhr.responseJSON.success1) {
                if (xhr.responseJSON.img_avatar !== "/nacho_framework2DAW/media/default-avatar.png") {
                    //$("#progress").show();
                    //$("#bar").width('100%');
                    //$("#percent").html('100%');
                    //$('.msg').text('').removeClass('msg_error');
                    //$('.msg').text('Success Upload image!!').addClass('msg_ok').animate({ 'right' : '300px' }, 300);
                }
            } else {
                $("#progress").hide();
                $('.msg').text('').removeClass('msg_ok');
                $('.msg').text('Error Upload image!!').addClass('msg_error').animate({
                    'right': '300px'
                }, 300);
            }
        });
    }
}

function remove_data() {
    $("#username").val('');
    $("#email").val('');
    $("#password").val('');
    $("#birthday").val('');
    $("#dropzone").val('');
    $(this).fill_or_clean();
}

function load_countries_v1() {
    // $.get( "index.php?module=users&function=load_pais&load_pais=true",
    //$.post( "../../users/load_pais/", { load_pais:true },
    $.post(amigable("?module=users&function=load_pais_users&aux=load_pais"),

        function( response ) {
            // console.log(response);
            if(response.match(/error/)){
                load_countries_v2("../resources/ListOfCountryNamesByName.json");
            }else{
                //load_countries_v2("../../users/load_pais/", { load_pais:true });
                load_countries_v2("../resources/ListOfCountryNamesByName.json");
            }
    })
    .fail(function(response) {
        load_countries_v2("../resources/ListOfCountryNamesByName.json");
    });
}

function load_countries_v2(cad) {
    $.getJSON( cad, function(data) {
        $("#pais").empty();
        $("#pais").append('<option value="" selected="selected">Selecciona un Pais</option>');
        // console.log(data);
        $.each(data, function (i, valor) {
            $("#pais").append("<option value='" + valor.sISOCode + "'>" + valor.sName + "</option>");
        });
    })
    .fail(function() {
        alert( "error load_countries" );
    });
}

function load_provincias_v1() { //provinciasypoblaciones.xml - xpath
    // $.get( "index.php?module=users&function=load_provincias&load_provincias=true",
    // $.post( "../../users/load_provincias_users/", { load_provincias:true },
    $.post(amigable("?module=users&function=load_provincias_users&aux=load_provincias"),
    function( response ) {
        // console.log(response);
        $("#provincia").empty();
        $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');

        var json = JSON.parse(response);
        var provincias=json.provincias;
        //alert(provincias);
        //console.log(provincias);
        //alert(provincias[0].id);
        //alert(provincias[0].nombre);
        if(provincias === 'error'){
            load_provincias_v2();
        }else{
            for (var i = 0; i < provincias.length; i++) {
                $("#provincia").append("<option value='" + provincias[i].id + "'>" + provincias[i].nombre + "</option>");
            }
        }
    })
    .fail(function(response) {
        load_provincias_v2();
    });
}

function load_provincias_v2() {
    $.get("resources/provinciasypoblaciones.xml", function (xml) {
	    $("#provincia").empty();
	    $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');

        $(xml).find("provincia").each(function () {
            var id = $(this).attr('id');
            var nombre = $(this).find('nombre').text();
            $("#provincia").append("<option value='" + id + "'>" + nombre + "</option>");
        });
    })
    .fail(function() {
        alert( "error load_provincias" );
    });
}


function load_poblaciones_v1(prov) { //provinciasypoblaciones.xml - xpath
    var datos = { idPoblac : prov  };
    // $.post("index.php?module=users&function=load_poblaciones&load_poblaciones=true", datos, function(response) {
    //$.post("../../users/load_poblaciones/", datos, function(response) {
    $.post(amigable("?module=users&function=load_poblaciones"),datos, function(response){
        // console.log(response);
        var json = JSON.parse(response);
        var poblaciones=json.poblaciones;
        //alert(poblaciones);
        //console.log(poblaciones);
        //alert(poblaciones[0].poblacion);

        $("#poblacion").empty();
        $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');

        if(poblaciones === 'error'){
            load_poblaciones_v2(prov);
        }else{
            for (var i = 0; i < poblaciones.length; i++) {
                $("#poblacion").append("<option value='" + poblaciones[i].poblacion + "'>" + poblaciones[i].poblacion + "</option>");
            }
        }
    })
    .fail(function() {
        load_poblaciones_v2(prov);
    });
}

function load_poblaciones_v2(prov) {
    $.get("resources/provinciasypoblaciones.xml", function (xml) {
		$("#poblacion").empty();
	    $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');

		$(xml).find('provincia[id=' + prov + ']').each(function(){
    		$(this).find('localidad').each(function(){
    			 $("#poblacion").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
    		});
        });
	})
	.fail(function() {
        alert( "error load_poblaciones" );
    });
}
