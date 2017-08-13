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
  <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="../../../css/newlayout.css" />
  <link rel="stylesheet" type="text/css" href="../../../css/calender.css" />
    
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
            
            <li class="active">
                <a href='../../login/view/dashboard.php'>Dashboard</a></li>
            <li class="active">Schedule Management</li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Schedule  <small>Management</small></h3>

                    <div style="text-align: center">
                        <br />
                  <span class="alert alert-success">
                      BF - Break Fast | MT - Morning Tea | L - Lunch
                        | ET - Evening Tea | D - Dinner
                  </span> 
                        
                    </div>
                             <div>
                                 
                <?php
include 'calender.php'; 
$calendar = new Calendar(); 
echo $calendar->show();
?>   
                
                
                </div>  
                    
                    
                   </div>
       
            </div>
            
            
        </div>
    </body>
</html>