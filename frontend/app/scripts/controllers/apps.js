'use strict';

/**
 * @ngdoc function
 * @name pribitokApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the pribitokApp
 */
angular.module('pribitokApp')
  .controller('AppsCtrl', AppsController)

AppsController.$inject = ['$scope', 'applicationResource'];

function AppsController($scope, applicationResource) {

    $scope.count = 0;
    applicationResource.query({lang: $scope.language.title}).$promise.then(function (result) {
        $scope.applications = result;
        $scope.count = $scope.applications.length;
        $scope.limit = 1;
    })

    $scope.showMore = function () {
        $scope.limit++;
    }
}
