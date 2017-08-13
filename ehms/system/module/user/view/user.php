<?php
if(!isset($_SESSION)){
    session_start();    
}

//Error reportinng PHP
//To avoid warning and notice that is created by undefined variable
error_reporting(E_ERROR | E_WARNING);
//session handling - to check whether login or not
include '../../../common/session_handling.php';

$userinfo=$_SESSION['userinfo']; //To get from session
$username=$userinfo['username'];
$user_id=$userinfo['user_id'];
$role_id=$userinfo['role_id'];
$role_name=$userinfo['role_name'];
$user_image=$userinfo['user_image'];

$page=$_GET['page']; //To get page no
if($page=="" || $page==1){
    $page1=0; //Starting point in 1 page
}else{
    $page1=($page*5)-5; //starting point base on page no
}



include '../../../common/dbconnection.php';
$obj=new dbconnection();
$con=$obj->connection();

//To get all records
$sqla="SELECT * FROM login l,user u,role r WHERE l.user_id=u.user_id AND "
        . "u.role_id=r.role_id ORDER BY u.user_id DESC";
$resulta=$con->query($sqla);
$nor=$resulta->num_rows;
$nopage=ceil($nor/5);

//To limit upto 5 records
$sql="SELECT * FROM login l,user u,role r WHERE l.user_id=u.user_id AND "
        . "u.role_id=r.role_id ORDER BY u.user_id DESC limit ".$page1.",5";
$result=$con->query($sql);
?>
<html>
    <head>
        <title>Elder's Home Management System</title>
        <link rel="icon" href="../../../images/favicon.png" />
  <link rel="stylesheet" type="text/css" 
        href="../../../bootstrap/css/bootstrap.min.css" />
  
  <link rel="stylesheet" type="text/css" href="../../../css/newlayout.css" />
 <script type="text/javascript" src="../../../js/scripts.js"></script>
 
 <link href="../../../common/css/jquery-ui.css" rel="stylesheet" 
       type="text/css"/>
<link href="../../../common/js/facebox/facebox.css" media="screen" 
      rel="stylesheet" type="text/css" /> 

<script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
  </script>
<script src="../../../common/js/jquery-ui.js" 
type="text/javascript"></script>
<script src="../../../common/js/facebox/facebox.js" 
type="text/javascript"></script>


<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../../../common/js/facebox/loading.gif',
        closeImage   : '../../../common/js/facebox/closelabel.png'
      });
    })
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
             <li><a href="../../login/view/dashboard.php">
                     <i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User Management</li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">User  <small>Management</small></h3>
                    <p style="padding: 10px;"> 
                        <a href="../view/adduser.php"><button type="button" class="btn btn-primary">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                            </button></a></p>
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
                            <div style="padding-left:20px; padding-right: 20px;">
                            <table class="table table-responsive" width="70%" >
                    <tr>
                        <th>&nbsp;</th>
                         <th>Name&nbsp;</th>
                          <th>Email&nbsp;</th>
                           <th>Role&nbsp;</th>
                            
                             <th>&nbsp;</th>
                    </tr>
                    <?php while($row=$result->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php if($row['user_image']==""){ ?>
              <img src="../../../images/user.png" width="50" height="auto" />        
                            <?php } else{ ?>
        <img src="../../../images/user_images/<?php echo $row['user_image'];?>"
                width="50" height="auto" />        
                            <?php } ?>                     
                            
                            &nbsp;</td>
                        <td>
                            <?php echo $row['fname']." ".$row['lname']; ?>
                            &nbsp;</td>
                        <td><?php echo $row['email']; ?>&nbsp;</td>
                        <td><?php echo $row['role_name']; ?>&nbsp;</td>
                        
                        <td>
                            <a href="../view/viewuser.php?user_id=<?php echo $row['user_id']; ?>&action=view" style="color:black" rel="facebox">
         <i class="glyphicon glyphicon-file"></i>
     </a>
                            
            <a href="../view/updateuser.php?user_id=<?php echo $row['user_id']; ?>&action=update" style="color:black">
         <i class="glyphicon glyphicon-edit"></i>
     </a>
    <?php if($role_id ==1|| $role_id==2){  // only role 1 and role2
        if($user_id!=$row['user_id']){
        
        ?>                  
    <a href="../controller/usercontroller.php?user_id=<?php echo $row['user_id']; ?>&action=delete&page=<?php echo $page; ?>" style="color:black">
        <i class="glyphicon glyphicon-trash" onclick="return confirmMsg(' Delete ')"></i>
     </a>
        <?php } } ?>
     <?php 
     if($role_id ==1|| $role_id==2){  // only role 1 and role2
         if($user_id!=$row['user_id']){
     if($row['user_status']=="Active"){ ?>
  <a href="../controller/usercontroller.php?
     user_id=<?php echo $row['user_id']; ?>
     &action=deactive&page=<?php echo $page; ?>">
      <button type="button" class="btn btn-warning btn-sm" 
              onClick="return confirmMsg('Deactivate')">
          Deactivate
      </button>
  </a>
                            
     <?php } else {?> 
         
     <a href="../controller/usercontroller.php?
        user_id=<?php echo $row['user_id']; ?>&action=active&page=<?php echo $page; ?>">
      <button type="button" class="btn btn-success btn-sm"
              onclick="return confirmMsg('Activate')">
          Activate
      </button>  </a>                          
                            
     <?php } 
         }
                    }
     ?>           
                            &nbsp;</td>                        
                    </tr>
                    <?php } ?>
                    
                            </table></div>
                            <nav class="container">
                                <ul class="pagination pagination-sm">
                                    <?php for($i=1;$i<=$nopage;$i++){
                                        ?>
                                    <li>
                     <a href="user.php?page=<?php echo $i;?>">
                                        <?php echo $i; ?>
                     </a>
                                    </li>
                                    <?php 
                                    }
                                    ?>
                                    
                                </ul>
                                
                                
                                
                                
                            </nav>                
            
                            
                   </div>
                
                
                
                
                
            </div>
            
            
        </div>
    </body>
</html>