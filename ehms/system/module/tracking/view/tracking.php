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

include '../model/trackingmodel.php';
$obj=new tracking();
$result=$obj->viewTracking();

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
  <link rel="stylesheet" type="text/css" 
        href="../../../css/dataTables.bootstrap.min.css" />
  <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">  </script>

      <script type="text/javascript" src="../../../js/jquery.autocomplete.pack.js"></script>
<script type="text/javascript" src="../../../js/script.js"></script>

<script type="text/javascript" 
        src="../../../js/jquery.dataTables.js"></script>

<script type="text/javascript" 
src="../../../js/dataTables.bootstrap.min.js"></script>
<script>         
         
         $(document).ready(function() {
    $('#example').DataTable();
} );
         
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
            
            <li class="active">Tracking Management</li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Tracking <small>Management</small></h3>
                    <div class="container-fluid">
                    <table class="table table-bordered table-condensed" 
                           id="example">
                        <thead>
                        <tr>
                            <th>Log ID</th>
                            <th>Name</th>
                            <th>LogIn</th>
                            <th>LogOut</th>
                            <th>IP Address</th>
                            <th>Time</th>                            
                        </tr>
                        </thead>
                         <tbody>
                        <?php while($row=$result->fetch_assoc()){ ?>
                       
                        <tr>
                            <td><?php echo $row['log_id']; ?></td>
                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                            <td><?php echo $row['log_in']; ?></td>
                            <td><?php echo $row['log_out']; ?></td>
                            <td><?php echo $row['ip_address']; ?></td>
                            <td>
                  <?php if($row['log_status']=="loggedout"){
                      $tin=strtotime($row['log_in']);
                          $tout=strtotime($row['log_out']);
                          $ttime=$tout-$tin;
                          echo gmdate("H:i:s",$ttime);
                      
                  } ?>
                                
                                
                                
                            </td>                   
                        </tr>       
                        <?php } ?>
                        </tbody>
                    </table>
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