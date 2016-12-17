$(document).ready(function () {
    $("#logout").click(function () {
        logout();
    });
});

function logout(){
    Tools.eraseCookie("user");
    window.location.href = amigable("?module=main/");
}
