<?php
if(!isset($_SESSION)){
    session_start();    
}

include '../../../common/query.php'; //To call common queries
$obj=new query(); //To create an object using query class
$result=$obj->addLogOut($_SESSION['session_id']);//To call a function called disRole from query



unset($_SESSION['userinfo']); //Destroy Sessions

unset($_SESSION['session_id']);

header("refresh:5,url=../../login/view/index.php");//Redirect into 
//login page in 5 seconds
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
  <script src="../../../sweetalert-master/dist/sweetalert.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="../../../sweetalert-master/dist/sweetalert.css">
  
    </head>
    <body>
        <script>
      swal({   title: "Logout alert!",   text: "You will logged out in 5 seconds.",   timer: 5000,   showConfirmButton: false });
      </script>
        <div id="newmain">
            <div id="newheader">
                <div id="leftheader">
    <img height="50" width="auto" 
        src="../../../images/Sustainability-SupportingOurCustomers_Icon.png" />
     Elder's Home Management System</div>
                <?php  
                //To get header part
               // include '../../../common/newheader.php'; ?>
            </div>
            <div id="newcontent">
                <div id="newsidebar">
                    <?php //include '../../../common/sidebar.php'; ?>
                </div>
                
                <div id="subcontent">
         <!-- To show the path -->
         <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Logout</li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Logout </h3>

                   </div>
                <p align="center">Successfully Logout from the system</p>
                <p align="center">
                    <img src="../../../images/loading.gif" width="300" 
                         height="auto" />
                </p>
                <p align="center">
                    <a href="../view/index.php" style="color:blue">Login</a></p>
                   
            </div>
            
            
        </div>
    </body>
</html>