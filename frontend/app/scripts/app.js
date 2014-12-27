'use strict';

/**
 * @ngdoc overview
 * @name pribitokApp
 * @description
 * # pribitokApp
 *
 * Main module of the application.
 */
angular
  .module('pribitokApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch'
  ]).config(configure);

configure.$inject = ['$routeProvider', '$locationProvider'];

function configure($routeProvider, $locationProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });

    $locationProvider.html5Mode(true);
}
