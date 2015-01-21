'use strict';

/**
 * @ngdoc function
 * @name pribitokApp.controller:AppDetailCtrl
 * @description
 * # AppDetailCtrl
 * Controller of the pribitokApp
 */
angular.module('pribitokApp')
    .controller('AppDetailCtrl', AppDetailCtrl)

AppDetailCtrl.$inject = ['$scope', 'applicationDetail'];

function AppDetailCtrl($scope, applicationDetail) {

    $scope.application = applicationDetail;
}

AppDetailCtrl.resolve = {
    applicationDetail: function($route, applicationResource) {
        return applicationResource.get({id: $route.current.params.id}).$promise.then(function (result) {
            return result;
        });
    }
}

AppDetailCtrl.resolve.applicationDetail.$inject = ['$route', 'applicationResource'];
