<?php
if(!isset($_SESSION)){
    session_start();    
}

//session handling - to check whether login or not
include '../../../common/session_handling.php';

$userinfo=$_SESSION['userinfo']; //To get from session
$username=$userinfo['username'];
$user_id=$userinfo['user_id'];
$role_id=$userinfo['role_id'];
$role_name=$userinfo['role_name'];
$user_image=$userinfo['user_image'];

$u_id=$_GET['user_id'];

include '../model/usermodel.php';
$ob=new user();
$result=$ob->getUser($u_id);

//To get user Information

$row=$result->fetch_assoc();
date_default_timezone_set("Asia/colombo"); //To set default time zone
$cdate=date("Y-m-d");
$ctimeid=strtotime($cdate); //Convert date nto time ID
$wtid=60*60*24*7;//No of seconds for a week
$gtid=$ctimeid-$wtid; //Time ID before 7 days
$wdate=date("Y-m-d",$gtid); //Convert time ID into Date


$resultj=$ob->getUserJob($u_id);


//echo "<br />";
//echo time();
//echo "<br />";
//echo date("H:i:s");
//echo "<br />";
//echo date_default_timezone_get();



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
  <script>
      function getDate(str){
          
      document.getElementById("show").innerHTML=
              "<input type='date' name='jto' id='jto' min='"+str+"'\n\
        class='input-sm' max='<?php echo $cdate; ?>'/>";
          
      }            
          
      
  </script>
  <script type="text/javascript" src="../../../js/scripts.js"></script>
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
             <li><a href="../../login/view/dashboard.php">
                     <i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User Management</li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Job  <small>Details</small></h3>
                    <h4 style="padding-left: 10px">User Information</h4>
                    <hr />
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                Name
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <?php echo $row['fname']." ".$row['lname'];?>
                                
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                Role
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                 <?php echo $row['role_name'];?>
                            </div>
                        </div>
                    </div>
                    
                    <h4 style="padding-left: 10px">Job Details</h4>
                    <hr />
                            <p align="center">
                                <?php if(isset($_GET['msg'])){
                                    $msg=base64_decode($_GET['msg']);
                                    if($_GET['id']==1){
                                        $style="alert-success";
                                    }else{
                                        $style="alert-danger";   
                                    }
                           ?>
                           <span class="<?php echo $style ?>">
                               <?php echo $msg; ?></span>   
                                <?php
                                    
                                }
                              ?>  
                            </p>
<form action="../controller/usercontroller.php?
      action=job&user_id=<?php echo $u_id; ?>" 
      method="post">
    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                               JOb Title
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
              <input type="text" class="input-sm" id="jtitle" 
                     name="jtitle" required  />
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                Field
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
         <input type="text" class="input-sm" id="jfield" 
                                       name="jfield" required   />
                            </div>
                        </div>
        <br />
        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                               From
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
              <input type="DATE" class="input-sm" id="jfrom" 
                 max="<?php echo $wdate; ?>"   name="jfrom" required 
                 onchange="getDate(this.value)"
                 
                 />
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                To
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
          <div id="show">
         <input type="DATE" class="input-sm" id="jto" 
                                       name="jto" required   />
          </div>
                            </div>
                        </div>
        <br />
        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                               Organization
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
              <input type="text" class="input-sm" id="oname" 
                     name="oname" size="60" required  />
                                
                            </div>
                            
        </div>
        <br />
        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                &nbsp;
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <button class="btn btn-primary" type="submit">Add</button>
                                
                            </div>
                            
        </div>
        
        
        
  </div>
</form>  
                            
                            
                            <br />
                            <table class="table table-condensed">
                                <tr>
                                <th>Job Title</th>
                                <th>Job FIeld</th>
                                <th>FROM</th>
                                <th>To</th>
                                <th>Years and months</th>
                                <th>Organization</th>
                                <th>&nbsp;</th></tr>
                                
             <?php while($rowj=$resultj->fetch_assoc()){ ?>
                                <tr>
         <td><?php echo $rowj['jtitle']; ?></td>
         <td><?php echo $rowj['jfield']; ?></td> 
         <td><?php echo $rowj['jfrom']; ?></td> 
         <td><?php echo $rowj['jto']; ?></td> 
         <td><?php //echo $rowj['jto']; ?></td>
         <td><?php echo $rowj['oname']; ?></td> 
         <td>
     <a href="../controller/jobcontroller.php?
        jd_id=<?php echo $rowj['jd_id']; ?>&action=update">EDIT</a>
         
       <a href="../controller/jobcontroller.php?jd_id=<?php echo $rowj['jd_id']; ?>&action=delete&user_id=<?php echo $u_id ?>"
          style="color:black" onclick="return confirmMsg('delete')">
           <i class="glyphicon glyphicon-trash"> </i>
       
       </a>  
         
         </td> 
                                    
                                </tr>
             <?php  } ?>         
                                
                            </table>
                    <hr />
                    <p style="text-align: center">
                    <a href="user.php">
                        <button class="btn btn-primary">
                            <i class="glyphicon glyphicon-home"></i>                  Finish
                        </button>
                    </a></p>       
                   </div>
                
                
                
                
                
            </div>
            
            
        </div>
    </body>
</html>