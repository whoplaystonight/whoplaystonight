$(document).ready(function () {
    $("#fb").click(function () {
        Login();
    });
});

window.fbAsyncInit = function () {
    FB.init({
        appId: '353792231658588', // App ID
        channelUrl: '//connect.facebook.net/en_US/all.js', // Channel File
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true  // parse XFBML
    });

    FB.Event.subscribe('auth.authResponseChange', function (response) {
        if (response.status === 'connected') {
            //document.getElementById("message").innerHTML += "<br>Connected to Facebook";
            //SUCCESS
        } else if (response.status === 'not_authorized') {
            //FB.login();
            //FAILED
        } else {
            //FB.login();
            //UNKNOWN ERROR
        }
    });
};

function Login() {
    FB.login(function (response) {
        if (response.authResponse) {
            getUserInfo();
        } else {
            console.log('User cancelled login or did not fully authorize');
        }
    }, {scope: 'email,user_photos,user_videos'});
}

function getUserInfo() {
    FB.api('/me', function (response) {
        FB.api('/me', {fields: 'id, first_name, last_name, email'},
        function (response) {
            var data = {"id": response.id, "name": response.first_name, "surname": response.last_name, "email": response.email};
            var datos_social = JSON.stringify(data);
            //$.post(amigable('?module=contact&function=social_signin'), {user: datos_social},
            console.log(datos_social);
            $.post(('../../users/social_signin'), {user: datos_social},
            function (response) {
                console.log("--------------------------");
                if (!response.error) {
                    console.log(response[0])
                    Tools.createCookie("user", response[0]['username'] + "|" + response[0]['avatar'] + "|" + response[0]['type'] + "|" + response[0]['name'], 1);
                    window.location.href = amigable("?module=main/");
                } else {
                    if (response.datos == 503)
                    window.location.href = amigable("?module=main&fn=begin&param=503");
                }
            }, "json").fail(function (xhr, textStatus, errorThrown) {
                console.log(xhr);
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
    );
});
}

function Logout() {
    FB.logout(function () {
        document.location.reload();
        Tools.eraseCookie("user");
        window.location.href = amigable("?module=main");
    });
}

// Load the SDK asynchronously
(function (d) {
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement('script');
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));
