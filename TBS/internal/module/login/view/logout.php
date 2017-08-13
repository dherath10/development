<?php
include '../../../common/session.php';
unset($_SESSION['user_info']);
header("refresh:5,url=../../login/view/index.php");
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
              <div id="headerleft"> Taxi Booking System</div>
               <div id="headerright">
                   &nbsp;
               </div>
               
           </div>
           <div id="newcontents">
               <div id="newsidebar">&nbsp;</div>
               <div id="right" style="text-align: center";>
                   <h2 align="center">You have successfully logout from the system</h2>
                   <hr/>
                   <p>After 5 seconds it will automatically redirect to login page....  </p>
                   <p><a href="../../login/view/index.php">Log In</a></p>
                   <p>&nbsp;</p>
                   <img src="../../../images/loading.gif">

               </div>
           </div>
       </div>
    </body>