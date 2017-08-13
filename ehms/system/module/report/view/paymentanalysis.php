<?php
if(!isset($_SESSION)){
    session_start();    
}
// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//session handling - to check whether login or not
include '../../../common/session_handling.php';

$userinfo=$_SESSION['userinfo']; //To get from session
$username=$userinfo['username'];
$user_id=$userinfo['user_id'];
$role_id=$userinfo['role_id'];
$role_name=$userinfo['role_name'];
$user_image=$userinfo['user_image'];

?>
<html>
    <head>
        <title>Elder's Home Management System</title>
        <link rel="icon" href="../../../images/favicon.png" />
  <link rel="stylesheet" type="text/css" 
        href="../../../bootstrap/css/bootstrap.min.css" />
  
  <link rel="stylesheet" type="text/css" href="../../../css/newlayout.css" />
  <link rel="stylesheet" type="text/css" href="../../../css/calender.css" />
  <link href="../../../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    
  <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">  </script>

      <script type="text/javascript" src="../../../js/jquery.autocomplete.pack.js"></script>
<script type="text/javascript" src="../../../js/script.js"></script>
<script>
  function getFromDate(from){
      document.getElementById('too').innerHTML='<input type="date" min='+from+' name="to" />';
      
  }
  
</script>


    </head>
    <body>
        <div id="newmain">
            <div id="newheader">
                <?php  
                //To get header part
                include '../../../common/newheader.php'; ?>
            </div>
            <div id="newcontent">
                <div id="newsidebar">
                    <?php include '../../../common/sidebar.php'; ?>
                </div>
                
                <div id="subcontent">
         <!-- To show the path -->
         <ol class="breadcrumb">
            
            <li>
                <a  class="a1" href='../../login/view/dashboard.php'>Dashboard</a></li>
            
            <li><a href="../../report/view/report.php" class="a1">Report </a></li>
            
            <li class="active">Payment Analysis </li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Payment  <small>Analysis</small></h3>

                    <div class="container-fluid">
                        <hr/>
          <form action="paymentanalysisbydate.php" method="post">
                        <h4><b>Payment :</b> From 
        <input type="date" name="from" required class="input-sm"
               onchange="getFromDate(this.value)"
               />
                        
                       
        
   
        <input type="submit" name="gen" class="btn btn-primary input-sm" 
               value="Genarate" />
                        </h4>
                    </form>
                    </div>
                     
                    
                    
                   </div>
       
            </div>
            
            
        </div>
        
        <script type="text/javascript">

$( "#dtype" ).change(function() {
	var typeid=$(this).val();
	if(typeid=='nd'){
		$(".ed_frm").fadeOut('slow');
		$(".nd_frm").fadeIn('slow');
	}else{
		$(".nd_frm").fadeOut('slow');
	$(".ed_frm").fadeIn('slow');
	}
});

</script>
    </body>
</html>