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

        .when('/mapView', {
            templateUrl: 'pages/mapView.html',
            controller: 'aboutController'
        })

        .otherwise({ redirectTo: '/' });
    
});

// create the controller and inject Angular's $scope
scotchApp.controller('mainController', function ($scope) {
    // create a message to display in our view
    $scope.message = 'Everyone come and see how good I look!';
});

scotchApp.controller('aboutController', function ($scope) {
    $scope.message = 'Look! I am an about page.';
});

scotchApp.controller('contactController', function ($scope) {
    $scope.message = 'Contact us! JK. This is just a demo.';
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