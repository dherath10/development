<?php include('head.php')?>
<body>



<br>
<br>
	<div class="container">
		    <div class="row">
    <div class="span4">
	<div class="alert alert-info">
	Search this data to search textbox
	</div>
	    <table class="table table-bordered">

    <thead>
    <tr>
    <th>Book  Title</th>
    </tr>
    </thead>
    <tbody>
	
	<?php
	$query=mysql_query("select DISTINCT Title from item")or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	?>
    <tr>
    <td><i class="icon-book"></i>&nbsp;<?php echo $row['Title']; ?></td>
  
    </tr>
	<?php } ?>
	
    </tbody>
    </table>
	
	
	</div>
    <div class="span8">
		
	<div class="hero-unit-2">
    <form>
	<input placeholder="Quick Search" class="input-large search-query" type="text" id="key" >
  	<div class="result"><div class="loading"></div></div>
    </form>
    </div>
	
	
	</div>

    </div>
 


	</div>
	
    
  
	






</body>
</html>