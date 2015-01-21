'use strict';

/**
 * @ngdoc function
 * @name pribitokApp.factory:applicationResource
 * @description
 * # applicationResource
 * Factory of the pribitokApp
 */

angular
    .module('pribitokApp')
    .factory('applicationResource', applicationResource);

applicationResource.$inject = ['$resource'];

function applicationResource($resource) {

    return $resource('/', {}, {
        query: {
            url: '/api/applications/:lang',
            method:'GET',
            isArray: true,
            cache: true
        },
        get: {
            url: '/api/application/:id',
            method:'GET',
            cache: true
        }
    });

}
