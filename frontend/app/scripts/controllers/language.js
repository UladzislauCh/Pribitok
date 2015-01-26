'use strict';

/**
 * @ngdoc function
 * @name pribitokApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the pribitokApp
 */
angular.module('pribitokApp')
    .controller('LanguageCtrl', LanguageController)

LanguageController.$inject = ['$scope', 'languageResource', 'defaultLanguage', '$window', '$route'];

function LanguageController($scope, languageResource, defaultLanguage, $window, $route) {

    $scope.getStaticData = function (lang) {
        languageResource.get({title: lang}).$promise.then(function (result) {
            $scope.staticData = result;
        });
    }

    $scope.language = { title: ""};

    if ($window.navigator.userLanguage)
        $scope.language.title = $window.navigator.userLanguage.slice(0, 2);
    else if ($window.navigator.language)
        $scope.language.title = $window.navigator.language.slice(0, 2);

    languageResource.query().$promise.then(function (result) {
        $scope.languages = result;

        if($scope.language.title == "") $scope.language.title = defaultLanguage;
        else {
            var found = false;
            angular.forEach(result, function(value, key) {
                if (value.title == $scope.language.title) {
                    found = true;
                }
            });
            if(!found) $scope.language.title = defaultLanguage;
        }
    });

    $scope.getStaticData($scope.language.title);
    $scope.showMenu = function() {
        $scope.show = true;
    }
    $scope.update = function (lang) {
        $scope.language = lang;
        $scope.getStaticData($scope.language.title);
        $route.reload();
        $scope.show = false;
    }
}
