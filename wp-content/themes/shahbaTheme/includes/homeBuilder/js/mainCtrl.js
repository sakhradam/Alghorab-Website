angular.module('mainCtrl', ['ui.sortable'])
    .controller('mainController', function($scope, $http, block) {
        $scope.loading = true;
        $scope.blocks = [];
        $scope.styles = [
            {'name':'vertical'},
            {'name':'horizontal'},
            {'name':'images'},
            {'name':'small'},
            {'name':'horizontal-small'},
            {'name':'vertical-small'},
        ];
        block.get()
            .success(function(data) {
                $scope.blocks = data;
                $scope.loading = false;
            });
        $scope.blocks.sort(function (a, b) {
            return a.order > b.order;
        });
        $scope.sortableOptions = {
            stop: function(e, ui) {
                for (var index in $scope.blocks) {
                    $scope.blocks[index].order = index;
                }
            }
        };
        $scope.toggleBlock = function(block) {
            block.show=!block.show;
        }
        $scope.deleteblock = function(index) {
            if(confirm('Sure to delete ? '+$scope.blocks[index].title)){
                $scope.blocks.splice(index,1);
            }
        };
        $scope.refresh = function(index) {
            $scope.loading = true;
            block.get()
                .success(function(data) {
                    $scope.blocks = data;
                    $scope.loading = false;
                });
        };
        $scope.addBlock = function() {
            $scope.blocks.push({'id':100000,'title':'New Block','order':99,'showposts':5,'category':0,'style':'vertical-small'});
        }
        $scope.saveChanges = function() {
            $scope.loading = true;
            var data = {'blocks':$scope.blocks,'action': 'shahba_save_home_builder'};
            $http({
                method: 'POST',
                cache: false,
                url: ajaxurl+'?action=shahba_save_home_builder',
                data: data
            }).success(function(){
                $scope.loading = false;
            });;
        }
    });