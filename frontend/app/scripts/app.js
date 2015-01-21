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
    'ngTouch',
    'slick'
  ]).config(configure);

configure.$inject = ['$routeProvider', '$locationProvider'];

function configure($routeProvider, $locationProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/apps', {
        templateUrl: 'views/apps.html',
        controller: 'AppsCtrl'
      })
      .when('/app/:id', {
        templateUrl: 'views/app-detail.html',
        controller: 'AppDetailCtrl',
        resolve: AppDetailCtrl.resolve
      })
      .when('/contact', {
        templateUrl: 'views/contact.html'
      })
      .otherwise({
        redirectTo: '/'
      });

    $locationProvider.html5Mode(true);
}