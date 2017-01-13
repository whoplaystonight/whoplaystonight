app.controller('cookiesCtrl', function ($scope, $rootScope, $http, accept_cookies_service, cookiesService) {

    $scope.close = function () {
        $rootScope.accept_cookies = false;
    };

    var user = accept_cookies_service.GetCredentials();
    if (user) { //si existe la cookie
        console.log(user);
        //$rootScope.accept_cookies = false;
        $rootScope.accept_cookies = true;

    }else{ //si no existe la cookie
        //console.log(user);
        $rootScope.accept_cookies = true;

        //obtenemos info del visitante
        var usuario = null;
        accept_cookies_service.obtain_info_guest().then(function (response) {
            //console.log(response.success);
            if (response.success) {
                usuario = response.data;

                //obtenemos el tipo de browser del visitante
                var browser = '';
                accept_cookies_service.obtain_browser_guest().then(function (response) {
                    //console.log(response.data);
                    browser = response.data;

                    //console.log(usuario);
                    //console.log(browser);

                    //guardar cookie
                    user =  {usuario: usuario, browser: browser};
                    accept_cookies_service.SetCredentials(user);
                });
            } else {
                //console.log(response.data);
            }
        });
    }
});
