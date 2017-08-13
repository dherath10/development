
<?php
//ERROR REPORTING
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include '../../../common/session.php';
include '../../../common/session_handling.php';
include '../../../common/display.php';
$obj = new display();
$result=$obj->viewUserName();
$resultLog=$obj->viewAllLog();

//include '../model/user.php';
//$obj = new user();
//$r=$obj->viewalluser();
//
//$key=$_POST['searchuser'];
//$r1=$obj->viewusersearch($key);


//$page=$_GET['page'];
//if($page=="" || $page==1){
//    $page1=0;
//}else{
//    $page1=($page*5)-5;
//    
//}
//
////To get all records in user table
//
//$nor=$r->num_rows;
//$nopage=ceil($nor/5);
//
////To limit records in user table
//$r1=$obj->viewuserlimit($page1);


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
        
        <link href="../../../css/dataTables.bootstrap.min.css" rel="stylesheet" />

     
        </script>
        <script src="../../../js/ajaxscripts.js"></script>
        
        
     
         
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
                 <?php include '../../../common/sidebar.php'; ?>  
               </div>
               <!--End of Start-->
               <div id="right">
                   <ol class="breadcrumb">
                       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                       <li><a href="../../login/view/dashboard.php">Dashboard</a></li>
                       <li class="active">User Tracking</li>
                       
                   </ol>
                            <h3 style="padding-left: 15px">User <small>
                                        Tracking</small></h3>
               
                   <h4 class="container">User Name : 
                       <select name="uname" class="input-sm" onchange="showUserLog(this.value)">
                           <option value="">Select a User Name</option>
                           <?php while($uname=$result->fetch_assoc()){ ?>
                           <option value="<?php echo $uname['user_id']; ?>"><?php echo $uname['user_name']." - ".sprintf('%03d',$uname['user_id']); ?></option>
                           <?php } ?>
                       </select>
                   </h4>
                   
                   <div class="container" id="displayU" >
                       
                       
                       
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
         <thead>
        <tr>
            <th>User Name</th>
            <th>Session ID</th>
            <th>Logged Date</th>
            <th>Logged Time</th>
            <th>IP Address</th>
        </tr>
         </thead>
        
           <tbody>
               <?php while($rowlog=$resultLog->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $rowlog['user_name']; ?></td>
            <td><?php echo $rowlog['session_id']; ?></td>
            <td><?php echo $rowlog['log_date']; ?></td>
            <td><?php echo $rowlog['log_time']; ?></td>
            <td><?php echo $rowlog['ip_address']; ?></td>
        </tr>
         <?php } ?>
           </tbody>
       
    </table>
               
                   </div>
               
                            
<!--               <nav class="container">
                   <ul class="pagination pagination-sm">
                       <?php // for($i=1;$i<=$nopage;$i++){ ?>
                       <li>
                           <a href="user.php?page=<?php // echo $i; ?>">
                               <?php // echo $i; ?>
                           </a>
                       </li>
                       <?php // } ?>
                   </ul>
               </nav>-->
               </div>            
           </div>
       </div>
    </body>
</html>