// create the module and name it scotchApp
// also include ngRoute for all our routing needs
var scotchApp = angular.module('scotchApp', ['ngRoute']);

// configure our routes
scotchApp.config(function ($routeProvider) {
    $routeProvider

        // route for the home page
        .when('/', {
            templateUrl: 'pages/home.html',
            controller: 'mainController'
        })

        // route for the about page
        .when('/aboutUs', {
            templateUrl: 'pages/aboutUs.html',
            controller: 'aboutController'
        })

        .when('/mapView/:id', {
            templateUrl: 'pages/mapView.html',
            controller: 'mapController'
        })

        .when('/mapView/', {
            templateUrl: 'pages/mapView.html',
            controller: 'mapController'
        })

        .otherwise({ redirectTo: '/' });
    
});

// create the controller and inject Angular's $scope
scotchApp.controller('mainController', function ($scope, $http, $rootScope) {

    $rootScope.hideFooter = false;
    $rootScope.className = "default";

    var localUrl = "http://localhost:8080/FPS-My/data/output/index.php";
    var serverUrl = "http://fpsapp.sis.uta.fi/data/output/";

    $http.get(localUrl).
       success(function (data, status, headers, config) {
           $scope.parking = data;
       }).
       error(function (data, status, headers, config) {
          console.log(data);
       });
});

scotchApp.controller('aboutController', function ($scope, $rootScope) {
    $scope.message = 'Look! I am an about page.';
    $rootScope.hideFooter = false;
    $rootScope.className = "default";
});

scotchApp.controller('mapController', function ($scope, $rootScope, $routeParams) {
    $rootScope.hideFooter = true;
    $rootScope.className = "map";

    refresh($routeParams.id);

    if($scope.parking != null){

      for(var i = 0; i < $scope.parking.length; i++){

        if($scope.parking[i].parkID == $routeParams.id){
          $scope.name = $scope.parking[i].name;
        }


      }

    }

    $scope.getClass = function(number, id){

      className = "";

      if(number == 0){
        className += "red";
      }else if (number < 6){
        className += "yellow";
      }else{
        className += "green";
      }

      if(id == $routeParams.id){
        className += " selected";
      }

      return className;

    }


    $scope.select =  function(id){

      $(".park-sign").removeClass('selected');

      $("#Park" + id).addClass('selected');

      var name = $("#Park" + id).attr("data-name");

      $scope.name = name;

  }
});

scotchApp.controller('contactController', function ($scope, $rootScope) {
    $scope.message = 'Contact us! JK. This is just a demo.';

    $rootScope.hideFooter = false;
    $rootScope.className = "default";
});

scotchApp.factory('httpErrorResponseInterceptor', ['$q', '$location',
  function ($q, $location) {
      return {
          response: function (responseData) {
              return responseData;
          },
          responseError: function error(response) {
              switch (response.status) {
                  case 401:
                      $location.path('/');
                      break;
                  case 404:
                      $location.path('/');
                      break;
                  default:
                      $location.path('/');
              }

              return $q.reject(response);
          }
      };
  }
]);