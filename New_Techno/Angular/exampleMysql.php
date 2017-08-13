<!DOCTYPE html>
<html ng-app="">
<head>
<link rel="stylesheet" href = "bootstrap-3.3.1/dist/css/bootstrap.min.css">
<script src= "angular.min.js"></script>
</head>
<style>
table, th , td {
  border: 1px solid grey;
  border-collapse: collapse;
  padding: 5px;
}
table tr:nth-child(odd) {
  background-color: #f1f1f1;
}
table tr:nth-child(even) {
  background-color: #ffffff;
}
</style>
<body>
<div ng-app="" ng-controller="customersController">
<table><tr ng-repeat="x in names"><td>{{ x.Fname }}</td><td>{{ x.District }}</td></tr></table></div>
<script>
function customersController($scope,$http) {
  $http.get("mysql.php")
  .success(function(response) {$scope.names = response;});
}</script></body>
</html>
