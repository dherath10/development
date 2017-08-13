<!DOCTYPE html>
<html>
<head>
   <title>Try v1.2 Bootstrap Online</title>
   <link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="jquery-2.1.4.min.js"></script>
   <script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
   
   <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//raw.github.com/botmonster/jquery-bootpag/master/lib/jquery.bootpag.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    
</head>
<body>
<div id="content" class="demo4_top"></div>

</body>
</html>
<script>

$('.demo4_top,.demo4_bottom').bootpag({
    total: 10,
    page: 2,
    maxVisible: 5,
    leaps: true,
    firstLastUse: true,
    first: '←',
    last: '→',
    wrapClass: 'pagination',
    activeClass: 'active',
    disabledClass: 'disabled',
    nextClass: 'next',
    prevClass: 'prev',
    lastClass: 'last',
    firstClass: 'first'
}).on("page", function(event, num){

	window.location = 'room_function3.php?page=' + num;
	//$(".content4").load("room_function3.php");
 //$(".content4").html("Page " + num); // or some ajax content loading...
}); 

</script>