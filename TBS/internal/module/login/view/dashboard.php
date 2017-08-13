<?php
include '../../../common/session.php';
include '../../../common/session_handling.php';
include '../../../common/display.php';
$user_name=$row['user_name'];
$obj = new display();
$result=$obj->viewLog($user_name);
$i=0;

                           
                            while($arr=$result->fetch_array()){
                            $i++;
                            if($i==2){
                            $_SESSION['logInfo']=$arr[1]." ".$arr[2];
                                 }
                             }
                          
?>

<html>
    <head>
        <title>Taxi Booking System for Colombo Cabs</title>
        <!-- favicon -->
        <link rel="icon" href="../../../images/yellow-taxi-10035627.jpg" />
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css"
              href="../../../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css"
              href="../../../css/layout.css" />
          
        <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
        </script>
        

    </head>
    <body>
       <div id="newmain">
           <div id="newheader">
               <?php
               //To include header part
               include '../../../common/header.php'; ?>
               
           </div>
           <div id="newcontents">
               <div id="newsidebar">
                   <!--Start-->
                        <?php
                        //To include sidebar
                        include '../../../common/sidebar.php'; ?>
                   <!--End-->
               </div>
               <div id="right">
                   <ol class="breadcrumb">
                       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                       <li class="active">Dashboard</li>
                   </ol>
                            <h3 style="padding-left: 15px">Dashboard <small>
                                        Control Panel</small></h3>
                   
                   
               </div>
           </div>
       </div>
    </body>