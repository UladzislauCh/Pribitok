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
    'pascalprecht.translate'
  ]).config(configure);

configure.$inject = ['$routeProvider', '$locationProvider', '$translateProvider'];

function configure($routeProvider, $locationProvider, $translateProvider) {
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

    $translateProvider
        .translations('en', {
            HEADLINE: 'Hello there, This is my awesome app!',
            INTRO_TEXT: 'And it has i18n support!'
        })
        .translations('de', {
            HEADLINE: 'Hey, das ist meine großartige App!',
            INTRO_TEXT: 'Und sie untersützt mehrere Sprachen!'
        });
    $translateProvider.preferredLanguage('en');
}