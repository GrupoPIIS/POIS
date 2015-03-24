var app = angular.module("app", ["ngRoute","ngResource"])

.config(['$routeProvider', function($routeProvider) 
{
	$routeProvider.when('/home', {
		templateUrl: 'templates/list.html',
		controller: 'HomeCtrl'
	})
	.when('/edit/:id', {
		templateUrl: 'templates/edit.html',
		controller: 'EditCtrl'
	})
	.when('/create', {
		templateUrl: 'templates/create.html',
		controller: 'CreateCtrl'
	})
	.otherwise({redirectTo: '/home'});
}])

.controller('HomeCtrl', ['$scope', 'pois', '$route', function ($scope, pois, $route)
{
	pois.get(function(data)
	{
		$scope.pois = data.response;
	});

	$scope.remove = function(id)
	{
		pois.delete({id:id}).$promise.then(function(data)
		{
			if (data.response) 
			{
				$route.reload;
			}
		})
	}
}])

.controller('EditCtrl', ['$scope', 'pois', '$routeParams', function ($scope, pois, $routeParams)
{
	$scope.settings = {
		pageTitle: "Editar poi",
		action: "Edit"
	};

	var id = $routeParams.id;

	pois.get({id:id}, function(data)
	{
		$scope.poi = data.response;
	})

	$scope.submit = function()
	{
		pois.update({id:$scope.poi.id}, {poi: $scope.poi}, function(data)
		{
			$scope.settings.success = "el POI se ha modificado correctamentes";
		});
	}

}])

.controller('CreateCtrl', ['$scope', 'pois', function ($scope, pois)
{
	$scope.settings = {
		pageTitle: "Crear poi",
		action: "Crear"
	};

	$scope.poi = {
		nombre:"",
		loc:"",
		lema:"",
		desc:""
	}

	$scope.submit = function()
	{
		pois.save({poi:$scope.poi}).$promise.then(function(data)
		{
			if (data.response) 
			{
				angular.copy({}, $scope.poi);
				$scope.settings.success = "el POI ha sido criado correctamentes";
			}
		})
	}

	
}])


.factory('pois', ["$resource", function ($resource)
{
	return $resource("http://localhost/POIS/backend/:id", {id:"@_id"}, {
		update:{method: "PUT", params: {id: "@_id"}}
	})
}]);