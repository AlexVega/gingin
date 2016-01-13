'use strict';

var app = angular.module('ginstagram.controller', []);

app.controller('InstaCtrl', function ($scope, $interval, instagram) {

	$scope.pics = [];
	$scope.have = [];
	$scope.orderBy = '-likes.count';
	$scope.getMore = function() {
        instagram.fetchPetmail(function(data) {
            for(var i=0; i<data.length; i++) {
              if (typeof $scope.have[data[i].id]==="undefined") {
                $scope.pics.push(data[i]) ;
                $scope.have[data[i].id] = "1";
              }
            }
        });
      };
      $scope.getMore();

})