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
 
$re=$obj->getBackupDetails();
                             
?>

<html>
    <head>
        <title>Taxi Booking System for Colombo Cabs</title>
        <!-- favicon -->
        <link rel="icon" href="../../../images/yellow-taxi-10035627.jpg" />
        <!-- Bootstrap -->
        <link href="../../../css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css"
              href="../../../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css"
              href="../../../css/layout.css" />
        <script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js"></script>
<script src="../../../js/jquery-1.12.3"></script>
 <script src="../../../js/jquery.dataTables.min.js"></script>
 <script src="../../../js/dataTables.bootstrap.min.js"></script>
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
                      
                       <li><a href="../../login/view/dashboard.php">Home</a></li>
                       <li class="active">
                           <a href="backup.php">Backup Management</a></li>
                        <li class="active">
                          Restore</li>
                   </ol>
                            <h3 style="padding-left: 15px">BackUp Management <small>
                                        </small></h3>
                   <div class="container-fluid">
                   
                   <hr />
                   <div align="center" class="alert alert-success">
                 <?php
                 if(isset($_GET['msg'])){
                     echo $_GET['msg'];
                 }
                 
                 ?>
                   </div>
                       </div>
                   <br />
                   <div class="row">
                       <div class="col-md-1">&nbsp;</div>
                           <div class="col-md-10">
                       <table id="example" class="table table-responsive" >
                            <thead>
                           <tr>                         
                               <th>ID</th>
                               <th>Date</th>
                                <th>Time</th>
                                 <th>Admin Name</th>
                                 <th>&nbsp;</th>            
                          </tr>
                           </thead> 
                           <tbody>
    <?php while($rowb=$re->fetch_assoc()){ ?>
                           <tr>
                           <td><?php echo $rowb['back_id']; ?>&nbsp;</td>
                           <td><?php echo $rowb['date']; ?>&nbsp;</td>
                           <td><?php echo $rowb['time']; ?>&nbsp;</td>
                           <td><?php echo $rowb['user_fname']." ".$rowb['user_lname']; ?>&nbsp;</td>
                           <td>
<a href="../controller/backupcontroller.php?action=restore&ref=<?php echo $rowb['ref']; ?>">
                               <button type="button" class="btn btn-primary">Restore</button>
                               </a>
                               
                               &nbsp;</td>
                           <tr> 
                               
    <?php } ?>
                           </tbody>
                           
                       </table>
                           </div>
                       <div class="col-md-1">&nbsp;</div>
                      
                       
                       
                   </div>
                   
                   </div>
                   
               </div>
           </div>
       </div>
    </body>