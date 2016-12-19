$(document).ready(start);
function start() {
    $.post(amigable("?module=locate&function=maploader"), {value: {send: true}},
    function (response) {
        //console.log(response);
        if (response.success) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(mostrarUbicacion);
                cargarmap(response.ofertas);
                cargarofertas(response.ofertas);
            } else {
                alert("¡Error! This browser doesn't support geolocation.");
            }
        } else {
            if (response.error == 503)
            window.location.href = amigable("?module=main&function=begin&param=503");
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

function mostrarUbicacion(position) {
    var times = position.timestamp;
    var latitud = position.coords.latitude;
    var longitud = position.coords.longitude;
    var altitud = position.coords.altitude;
    var exactitud = position.coords.accuracy;

    Tools.createCookie("lat", latitud, 1);
    Tools.createCookie("lon", longitud, 1);
}

function refrescarUbicacion() {
    navigator.geolocation.watchPosition(mostrarUbicacion);
}

function cargarofertas(of) {
    for (var i = 0; i < of.length; i++) {
        var content = '<div class="of" id="' + of[i].band_id + '"><div class="desc">' + of[i].band_name + '</div><div class="fecha"> Date: ' + of[i].date_event + '</div><div class="hora"> Event hour: ' + of[i].start + ' - ' + of[i].end + '</div><div class="precio"> Event type: ' + of[i].type_event + '</div></div>';
        $('.ofertas').append(content);
    }
}

function marcar(map, oferta) {
    var latlon = new google.maps.LatLng(oferta.latitud, oferta.longitud);
    var marker = new google.maps.Marker({position: latlon, map: map, title: oferta.descripcion, animation: google.maps.Animation.DROP});

    var infowindow = new google.maps.InfoWindow({
        content: '<h1 class="oferta_title">' + oferta.band_name + '</h1><p class="oferta_content">' + oferta.date_event + '</p><p class="oferta_content">Event hour: ' + oferta.start + ' - ' + oferta.end + '</p>'
    });
    google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);

        //acceder al dom del InfoWindow para mejorar su aspecto
        google.maps.event.addListener(infowindow, 'domready', function () {
            var iwOuter = $('.gm-style-iw');
            var iwCloser = iwOuter.next();
            var iwBackground = iwOuter.prev();

            iwBackground.children(':nth-child(2)').css({'display': 'none'});
            iwBackground.children(':nth-child(4)').css({'display': 'none'});
            iwBackground.children(':nth-child(1)').attr('style', function (i, s) {
                return s + 'left: 76px !important;'
            });
            iwBackground.children(':nth-child(3)').attr('style', function (i, s) {
                return s + 'left: 76px !important;'
            });
            iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'background-color': '#f5f5f5', 'z-index': '1'});

            iwCloser.css({
                opacity: '1',
                right: '18px', top: '3px',
                'border-radius': '13px', // circular effect
                'box-shadow': '0 0 5px #3990B9' // 3D effect to highlight the button
            });

            iwCloser.mouseout(function () {
                $(this).css({opacity: '1'});
            });
        });
    });
}

function cargarmap(arrArguments) {
    var x = document.getElementById("demo");
    navigator.geolocation.getCurrentPosition(showPosition, showError);

    function showPosition(position){
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        var latlon = new google.maps.LatLng(lat, lon);
        var mapholder = document.getElementById('mapholder');
        //mapholder.style.height = '550px';
        //mapholder.style.width = '900px';
        var myOptions = {
            center: latlon, zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL}
        };
        var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
        // var marker = new google.maps.Marker({position: latlon, map: map, title: "You are here!"});

        for (var i = 0; i < arrArguments.length; i++)
        marcar(map, arrArguments[i]);
    }
    function showError(error){
        switch (error.code){
            case error.PERMISSION_DENIED:
            x.innerHTML = "Denegada la peticion de Geolocalización en el navegador.";
            break;
            case error.POSITION_UNAVAILABLE:
            x.innerHTML = "La información de la localización no esta disponible.";
            break;
            case error.TIMEOUT:
            x.innerHTML = "El tiempo de petición ha expirado.";
            break;
            case error.UNKNOWN_ERROR:
            x.innerHTML = "Ha ocurrido un error desconocido.";
            break;
        }
    }
}
