'use strict';

/**
 * @ngdoc function
 * @name pribitokApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the pribitokApp
 */
angular.module('pribitokApp')
  .controller('AboutCtrl', AboutController)

AboutController.$inject = ['$scope', '$translate'];

function AboutController($scope, $translate) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
};
