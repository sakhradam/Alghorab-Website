angular.module('blockService', [])
    .factory('block', function($http) {
        return {
            get : function() {
                return $http({
                    method: 'POST',
                    url: ajaxurl,
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    params: {'action': 'shahba_home_builder'}
                });
            },
            save : function(blocks) {
                return $http({
                    method: 'POST',
                    url: ajaxurl,
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    params: {'blocks':JSON.stringify(blocks),'action':'shahba_save_home_builder'}
                });
            },
        }
    });