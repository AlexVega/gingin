'use strict';

/**
*  Module
*
* Description
*/
var app = angular.module('ginstagram.service', []);

//Instagram Service
app.factory('instagram',['$http',function ($http){
	return{
		fetchPetmail: function(callback){
			var ApiInstagram = 'https://api.instagram.com/v1/tags/ginginpolanco/media/recent?client_id=af3a30384fd04509b91d0ee3918cf9e8&callback=JSON_CALLBACK';

			$http.jsonp(ApiInstagram).success(function(response){
				callback(response.data);
			}) 
		}
	}

}])