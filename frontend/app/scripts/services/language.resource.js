'use strict';

/**
 * @ngdoc function
 * @name pribitokApp.factory:languageResource
 * @description
 * # languageResource
 * Factory of the pribitokApp
 */

angular
    .module('pribitokApp')
    .factory('languageResource', languageResource);

languageResource.$inject = ['$resource'];

function languageResource($resource) {

    return $resource('/', {}, {
        query: {
            url: '/api/languages',
            method:'GET',
            isArray: true,
            cache: true
        },
        get: {
            url: '/api/language/:title',
            method:'GET',
            cache: true
        }
    });

}
