var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'ui.bootstrap', 'ngCookies']);

app.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider
                // Home
                .when("/", {templateUrl: "frontend/modules/main/view/main.view.html", controller: "mainCtrl"})
                
                // cookies
                .when("/cookies", {templateUrl: "frontend/modules/cookies/view/cookies.view.html", controller: "cookiesCtrl"})

                // else 404
                .otherwise("/", {templateUrl: "frontend/modules/main/view/main.view.html", controller: "mainCtrl"});
    }]);
