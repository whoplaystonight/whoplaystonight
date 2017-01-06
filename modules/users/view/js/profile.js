$(document).ready(function () {
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);

    $("#inputBirth").datepicker({
        maxDate: '0',
        changeMonth: true,
        changeYear: true,
        yearRange: "1930:2020"
    });

    $('#submitBtn_user').click(function () {
        validate_modify_user();
    });

    $("#inputName, #inputSurn, #inputPass, #inputBank").keyup(function () {
        if ($(this).val() !== "") {
            $(".error").fadeOut();
            return false;
        }
    });
    $("#inputName").keyup(function () {
        if ($(this).val().length >= 2) {
            $(".error").fadeOut();
            return false;
        }
    });
    $("#inputSurn").keyup(function () {
        if ($(this).val().length >= 3) {
            $(".error").fadeOut();
            return false;
        }
    });
    $("#inputPass").keyup(function () {
        if ($(this).val().length >= 6) {
            $(".error").fadeOut();
            return false;
        }
    });
    $("#inputBank").keyup(function () {
        if ($(this).val().length >= 6) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#progress").hide();

    Dropzone.autoDiscover = false;
    $("#dropzone").dropzone({
        url: amigable("?module=user&function=upload_avatar"),
        addRemoveLinks: true,
        maxFileSize: 1000,
        dictResponseError: "Ha ocurrido un error en el server",
        acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
        init: function () {
            this.on("success", function (file, response) {
                $("#progress").show();
                $("#bar").width('100%');
                $("#percent").html('100%');
                $('.msg').text('').removeClass('msg_error');
                $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '300px'}, 300);
            });
        },
        complete: function (file) {
            //if(file.status == "success"){
            //alert("El archivo se ha subido correctamente: " + file.name);
            //}
        },
        error: function (file) {
            //alert("Error subiendo el archivo " + file.name);
        },
        removedfile: function (file, serverFileName) {
            var name = file.name;
            $.ajax({
                type: "GET",
                url: amigable("?module=user&function=delete_avatar&delete=true"),
                data: {"filename": name},
                success: function (data) {
                    $("#progress").hide();
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    $("#e_avatar").html("");

                    var json = JSON.parse(data);
                    if (json.res === true) {
                        var element;
                        if ((element = file.previewElement) != null) {
                            element.parentNode.removeChild(file.previewElement);
                            //alert("Imagen eliminada: " + name);
                        } else {
                            false;
                        }
                    } else { //json.res == false, elimino la imagen también
                        var element;
                        if ((element = file.previewElement) != null) {
                            element.parentNode.removeChild(file.previewElement);
                        } else {
                            false;
                        }
                    }
                }
            });
        }
    });

    $("#provincia").empty();
    $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');
    $("#provincia").prop('disabled', true);
    $("#poblacion").empty();
    $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');
    $("#poblacion").prop('disabled', true);

    $("#pais").change(function () {
        var pais = $(this).val();
        var provincia = $("#provincia");
        var poblacion = $("#poblacion");

        if (pais !== 'ES') {
            provincia.prop('disabled', true);
            poblacion.prop('disabled', true);
            $("#provincia").empty();
            $("#poblacion").empty();
        } else {
            provincia.prop('disabled', false);
            poblacion.prop('disabled', false);
            load_provincias_v1("");
        }
    });

    $("#provincia").change(function () {
        var prov = $(this).val();
        if (prov > 0) {
            load_poblaciones_v1(prov, "");
        } else {
            $("#poblacion").prop('disabled', false);
        }
    });

    var user = Tools.readCookie("user");
    if (user) {
        user = user.split("|");
        $.post(amigable('?module=user&function=profile_filler'), {usuario: user[0]},
        function (response) {
            if (response.success) {
                fill(response.user);
                load_countries_v1(response.user['pais']);
                if (response.user['pais'] === "ES") {
                    $("#provincia").prop('disabled', false);
                    $("#poblacion").prop('disabled', false);
                    load_provincias_v1(response.user['provincia']);
                    load_poblaciones_v1(response.user['provincia'], response.user['poblacion']);
                }
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
        alert('User profile not available');
    }
});

function load_countries_v2(cad, pais) {
    $.getJSON(cad, function (data) {
        $("#pais").empty();
        //if (!pais)
            $("#pais").append('<option value="" selected="selected">Selecciona un Pais</option>');

        $.each(data, function (i, valor) {
            if (valor.sName.length > 20)
                valor.sName = valor.sName.substring(0, 19);
            if (pais == valor.sISOCode)
                $("#pais").append("<option value='" + valor.sISOCode + "' selected='selected' >" + valor.sName + "</option>");
            else
                $("#pais").append("<option value='" + valor.sISOCode + "'>" + valor.sName + "</option>");

        });
    })
    .fail(function () {
        alert("error load_countries");
    });
}

function load_countries_v1(pais) {
    $.get(amigable("?module=user&function=load_pais_user&load_pais=true"),
            function (response) {
                //console.log(response);
                if (response === 'error') {
                    load_countries_v2("https://projects-alumnes-yomogan.c9users.io/proj_final_login/JoinElderly/resources/ListOfCountryNamesByName.json", pais);
                } else {
                    load_countries_v2(amigable("?module=user&function=load_pais_user&load_pais=true"), pais); //oorsprong.org
                }
            })
            .fail(function (response) {
                load_countries_v2("https://projects-alumnes-yomogan.c9users.io/proj_final_login/JoinElderly/resources/ListOfCountryNamesByName.json", pais);
            });
}

function load_provincias_v2(prov) {
    $.get("resources/provinciasypoblaciones.xml", function (xml) {
        $("#provincia").empty();
        //$("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');

        $(xml).find("provincia").each(function () {
            var id = $(this).attr('id');
            var nombre = $(this).find('nombre').text();
            if (prov == id)
                $("#provincia").append("<option value='" + id + "' selected='selected'>" + nombre + "</option>");
            else
                $("#provincia").append("<option value='" + id + "'>" + nombre + "</option>");
        });
    })
    .fail(function () {
        alert("error load_provincias");
    });
}

function load_provincias_v1(prov) { //provinciasypoblaciones.xml - xpath
    $.get(amigable("?module=user&function=load_provincias_user&load_provincias=true"),
            function (response) {
                $("#provincia").empty();
                //$("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');

                //alert(response);
                var json = JSON.parse(response);
                var provincias = json.provincias;

                if (provincias === 'error') {
                    load_provincias_v2(prov);
                } else {
                    for (var i = 0; i < provincias.length; i++) {
                        if (prov == provincias[i].id)
                            $("#provincia").append("<option value='" + provincias[i].id + "' selected='selected'>" + provincias[i].nombre + "</option>");
                        else
                            $("#provincia").append("<option value='" + provincias[i].id + "'>" + provincias[i].nombre + "</option>");

                    }
                }
            })
            .fail(function (response) {
                load_provincias_v2(prov);
            });
}

function load_poblaciones_v2(prov, pobl) {
    $.get("https://projects-alumnes-yomogan.c9users.io/proj_final_login/JoinElderly/resources/provinciasypoblaciones.xml", function (xml) {
        $("#poblacion").empty();
        // $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');

        $(xml).find('provincia[id=' + prov + ']').each(function () {
            $(this).find('localidad').each(function () {
                var text = $(this).text();
                if (text.length > 22)
                    text = text.substring(0, 21);
                if (pobl == text)
                    $("#poblacion").append("<option value='" + text + "' selected='selected' >" + text + "</option>");
                else
                    $("#poblacion").append("<option value='" + text + "'>" + text + "</option>");
            });
        });
    })
    .fail(function () {
        alert("error load_poblaciones");
    });
}

function load_poblaciones_v1(prov, pobl) {
    var datos = {idPoblac: prov};
    $.post(amigable("?module=user&function=load_poblaciones_user"), datos, function (response) {
        var json = JSON.parse(response);
        var poblaciones = json.poblaciones;

        $("#poblacion").empty();
        // $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');

        if (poblaciones === 'error') {
            load_poblaciones_v2(prov);
        } else {
            for (var i = 0; i < poblaciones.length; i++) {
                if (poblaciones[i].poblacion.length > 22)
                    poblaciones[i].poblacion = poblaciones[i].poblacion.substring(0, 21);
                if (pobl == poblaciones[i].poblacion)
                    $("#poblacion").append("<option value='" + poblaciones[i].poblacion + "' selected='selected'>" + poblaciones[i].poblacion + "</option>");
                else
                    $("#poblacion").append("<option value='" + poblaciones[i].poblacion + "'>" + poblaciones[i].poblacion + "</option>");

            }
        }
    })
    .fail(function () {
        load_poblaciones_v2(prov, pobl);
    });
}

function validate_modify_user() {
    var result = true;
    var nomreg = /^\D{3,30}$/;
    var apelreg = /^(\D{3,30})+$/;
    var nombre = $("#inputName").val();
    var apellidos = $("#inputSurn").val();
    var email = $("#inputEmail").val();
    var password = $("#inputPass").val();
    var date_birthday = $("#inputBirth").val();
    var bank = $("#inputBank").val();
    var dni = $("#inputDni").val();
    var pais = $("#pais").val();
    var provincia = $("#provincia").val();
    var poblacion = $("#poblacion").val();

    $(".error").remove();
    if ($("#inputName").val() === "" || !nomreg.test($("#inputName").val())) {
        $("#inputName").focus().after("<span class='error'>Ingrese su nombre</span>");
        result = false;
    } else if ($("#inputName").val().length < 2) {
        $("#inputName").focus().after("<span class='error'>Mínimo 2 carácteres para el nombre</span>");
        result = false;
    } else if ($("#inputSurn").val() === "" || !apelreg.test($("#inputSurn").val())) {
        $("#inputSurn").focus().after("<span class='error'>Ingrese sus apellidos</span>");
        result = false;
    } else if ($("#inputSurn").val().length < 3) {
        $("#inputSurn").focus().after("<span class='error'>Mínimo 3 carácteres para los apellidos</span>");
        result = false;
    } else if ($("#inputPass").val() === "") {
        $("#inputPass").focus().after("<span class='error'>Ingrese su contraseña</span>");
        result = false;
    } else if ($("#inputPass").val().length < 6) {
        $("#inputPass").focus().after("<span class='error'>Mínimo 6 carácteres para la contraseña</span>");
        result = false;
    }

    if (result) {
        if (provincia == null) {
            provincia = '';
        } else if (provincia.length == 0) {
            provincia = '';
        } else if (provincia === 'Selecciona una Provincia') {
            return '';
        }

        if (poblacion == null) {
            poblacion = '';
        } else if (poblacion.length == 0) {
            poblacion = '';
        } else if (poblacion === 'Selecciona una Poblacion') {
            return '';
        }

        var data = {"nombre": nombre, "apellidos": apellidos, "date_birthday": date_birthday, "password": password, "bank": bank,
            "usuario": $("#username").text(), "email": email, "dni": dni, "pais": pais, "provincia": provincia, "poblacion": poblacion};
        var data_users_JSON = JSON.stringify(data);
        $.post(amigable('?module=user&function=modify'), {mod_user_json: data_users_JSON},
        function (response) {
            if (response.success) {
                window.location.href = response.redirect;
            } else {
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else
                if (response["datos"]["nombre"] !== undefined && response["datos"]["nombre"] !== null) {
                    $("#inputName").focus().after("<span class='error'>" + response["datos"]["nombre"] + "</span>");
                }
                if (response["datos"]["apellidos"] !== undefined && response["datos"]["apellidos"] !== null) {
                    $("#inputSurn").focus().after("<span class='error'>" + response["datos"]["apellidos"] + "</span>");
                }
                if (response["datos"]["password"] !== undefined && response["datos"]["password"] !== null) {
                    $("#inputPass").focus().after("<span class='error'>" + response.error.password + "</span>");
                }
                if (response["datos"]["date_birthday"] !== undefined && response["datos"]["date_birthday"] !== null) {
                    $("#inputBirth").focus().after("<span class='error'>" + response["datos"]["date_birthday"] + "</span>");
                }
                if (response["datos"]["bank"] !== undefined && response["datos"]["bank"] !== null) {
                    $("#inputBank").focus().after("<span class='error'>" + response["datos"]["bank"] + "</span>");
                }
                if (response["datos"]["dni"] !== undefined && response["datos"]["dni"] !== null) {
                    $("#inputDni").focus().after("<span class='error'>" + response["datos"]["dni"] + "</span>");
                }
                if (response["datos"]["pais"] !== undefined && response["datos"]["pais"] !== null) {
                    $("#pais").focus().after("<span class='error'>" + response["datos"]["pais"] + "</span>");
                }
                if (response["datos"]["provincia"] !== undefined && response["datos"]["provincia"] !== null) {
                    $("#provincia").focus().after("<span class='error'>" + response["datos"]["provincia"] + "</span>");
                }
                if (response["datos"]["poblacion"] !== undefined && response["datos"]["poblacion"] !== null) {
                    $("#poblacion").focus().after("<span class='error'>" + response["datos"]["poblacion"] + "</span>");
                }
            }
        }, "json").fail(function (xhr, textStatus, errorThrown) {
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

function fill(user) {
    $("#inputName").val(user['nombre']);
    $("#inputSurn").val(user['apellidos']);
    $("#inputBirth").val(user['date_birthday']);
    $("#inputPass").val("");
    $("#inputBank").val(user['bank']);
    $("#username").html(user['nombre']);
    $("#avatar_user").attr('src', user['avatar']);
    $("#inputEmail").val(user['email']);
    $("#inputDni").val(user['dni']);
    if (user['email'])
        $("#inputEmail").attr('disabled', true);
    if (user['dni'])
        $("#inputDni").attr('disabled', true);
}
