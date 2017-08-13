<!DOCTYPE html>
<html ng-app="">
<head>
<link rel="stylesheet" href = "bootstrap-3.3.1/dist/css/bootstrap.min.css">
<script src= "angular.min.js"></script>
</head>

<body>
<div ng-app="" ng-init="mySwitch=true">
<p>
<button ng-disabled="mySwitch">Click Me!</button>
</p>
<p>
<input type="checkbox" ng-model="mySwitch"/>Button
</p>
<p>
{{ mySwitch }}
</p>
</div> 


<div ng-app="" ng-controller="myController">

<button ng-click="count = count + 1">Click Me!</button>

<p>{{ count }}</p>

</div>
<script>
function myController($scope) {
    $scope.count = 0;
}
</script>

<br /><br />
<div ng-app="" ng-controller="personController">

<button ng-click="toggle()">Toggle</button>

<p ng-hide="myVar">
First Name: <input type="text" ng-model="firstName"><br>
Last Name: <input type="text" ng-model="lastName"><br>
<br>
Full Name: {{firstName + " " + lastName}}
</p>

</div>

<script>
function personController($scope) {
    $scope.firstName = "John",
    $scope.lastName = "Doe"
    $scope.myVar = false;
    $scope.toggle = function() {
        $scope.myVar = !$scope.myVar;
    };
}
</script>

<div ng-app="" ng-controller="personController">

<button ng-click="toggle()">Toggle</button>

<p ng-show="myVar">
First Name: <input type="text" ng-model="firstName"><br>
Last Name: <input type="text" ng-model="lastName"><br>
<br>
Full Name: {{firstName + " " + lastName}}
</p>

</div>

<script>
function personController($scope) {
    $scope.firstName = "John",
    $scope.lastName = "Doe"
    $scope.myVar = true;
    $scope.toggle = function() {
        $scope.myVar = !$scope.myVar;
    };
}
</script>







</body>
</html>
