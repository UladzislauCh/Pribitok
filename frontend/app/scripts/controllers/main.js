'use strict';

/**
 * @ngdoc function
 * @name pribitokApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the pribitokApp
 */
angular.module('pribitokApp')
    .controller('MainCtrl', MainCtrl)

MainCtrl.$inject = ['$scope', 'applicationResource'];

function MainCtrl($scope, applicationResource) {

    applicationResource.query({lang: $scope.language.title}).$promise.then(function (result) {
        $scope.applications = result;
        console.log(result);
    })

}
