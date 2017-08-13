<?php
if(!isset($_SESSION)){
    session_start();
 }
 //ERROR REPORTING
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 
    //To store logged user's information
 $userinfo=$_SESSION['userinfo'];
 $role_id=$userinfo['role_id'];
 $u_id=$userinfo['user_id']; 
 
$page=$_GET['page'];
if($page=="" || $page==1){
    
    $page1=0;
}else{
    $page1=($page*5)-5;
    
}

include '../model/trackmodel.php';
$obj=new track();
$result=$obj->viewAllTracking();

?>
<html>
    <head> 
        <title>OnLine Sale Management System</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" 
          href="../../../css/mainlayout.css" />
    <link type="text/css" rel="stylesheet" href="../../../css/datatable.css" />
     
    <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
     
    </script>
   
    <script type="text/javascript">
        function confirmMsg(action){
            var r=confirm("Do You want to "+action+ " ?");
            if(r){
                return true;
            }else{
                return false;
            }
                
        }
        //Focus on search element when the user page is being loading
        function focusSearch(){
            document.getElementById('search').focus();
            
        }
        
        
    </script>
    <script type="text/javascript" src="../../../js/ajaxscript.js">     
        </script>
        <script type="text/javascript" src="../../../js/datatable.js">     
        </script>
        <script type="text/javascript" src="../../../js/jquery.bdt.js">     
        </script>
        <script>  
            $(document).ready( function () {  
             $('#usermanagement').bdt();  
         });  
        </script> 
        
    </head>
    <body onload="focusSearch()">
        <div id="main">
            <div id="header">
               <?php include '../../../common/header.php'; ?>      
              
            </div>
            <div id="navi">
                <?php include '../../../common/navi.php'; ?>
                
                &nbsp;</div>
            <div id="contents">
                <div>
                    <ol class="breadcrumb">
                                <li>
     <a href="../../login/view/dashboard.php">               
         Dashboard </a></li> 
         <li class="active">
             <a href="../view/track.php">
             User Tracking
             </a></li>
                    </ol> 
    <h3 align="center">User Tracking <small>Management</small></h3>
                    
                </div>
                <HR />
                <div class="container-fluid" style="padding-left: 100px;padding-right: 100px">
                    <table class="table table-responsive">
                    <tr>
                        <th>Log ID</th>
                        <th>User Name</th>
                        <th>Date and Time</th>
                        <th>IP Address</th>
                        
                    </tr>
                    </table>
                    <table class="table table-responsive"
                           id="usermanagement">
                    
                    <?php while($row=$result->fetch_assoc()){ ?>
                    <tr>
                            <td><?php echo $row['log_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['log_date']." ".$row['log_time']; ?></td>
                            <td><?php echo $row['ip']; ?></td>
                    </tr>
                    <?php } ?>                    
                </table>   
            </div> 
            
            <div id="footer">
                
               <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
        
    </body>
    
</html>
