<?php
//ERROR REPORTING
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include '../../../common/session.php';
include '../../../common/session_handling.php';

include '../model/user.php';
$obj = new user();
$r=$obj->viewalluser();

$page=$_GET['page'];
if($page=="" || $page==1){
    $page1=0;
}else{
    $page1=($page*5)-5;
    
}

//To get all records in user table

$nor=$r->num_rows;
$nopage=ceil($nor/5);

//To limit records in user table
$r1=$obj->viewuserlimit($page1);

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
        <script type="text/javascript" src="../../../js/jquery-2.2.1.min.js">
        </script>
        <script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>
        
        <script>
            function disMsg(m){
                var r=confirm("Do you want to "+m+" User ? :");
                if(r){
                    return true;
                }else{
                    return false;
                }
            }
            
               $(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'fetch_record.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
});
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
                       <li class="active">User Management</li>
                   </ol>
                            <h3 style="padding-left: 15px">User <small>
                                        Management</small></h3>
               
               <!--Grid-->
               <div class="container">
                   <div class="row">
                       <div class="col-md-6">
                           <a href="../../user/view/adduser.php">
                           <button type="button" class="btn btn-primary">
                               <i class="glyphicon glyphicon-plus"></i> Add User</button>
                           </a></div>
                       
                       <div class="col-md-6">
                           <form method="post" action="../view/usersearch.php?action=search">
                           Search : <input type="text" class="input-sm"
                                           name="searchuser" id="searchuser" />
                           <button type="submit" class="btn btn-primary">
                               <i class="glyphicon glyphicon-search"></i>Search
                           </button>
                           
                           
                           </form>
                       </div>
                   </div>
                   
               </div>
               <!--Grid End-->
               <br />
               
               <!--msg-->
               <div>
                   <?php 
                   if(isset($_GET['msg'])) {
                       $msg=  base64_decode($_GET['msg']);
                         if($_GET['id']==1){
                             $style="alert-success";
                         }else{
                             $style="alert-danger";
                         }
                         echo "<span class='".$style."'>".$msg."</span>";
                   }
                   ?>
               </div>
               <!--end of msg-->
               
                            <table class="table table-responsive table-hover">
                               <tr>
                                   <th>&nbsp;</th>
                                   <th>First Name</th>
                                   <th>Last Name</th>
                                   <th>User Role</th>
                                   <th>NIC</th>
                                   <th>&nbsp;</th>
                                       
                               </tr>
                               <?php while($user=$r1->fetch_assoc()){ ?>
                               <tr>
                                   <td align="center"><?php 
                                   if($user['user_image']==""){ ?>
                                       <img src="../../../images/donor.png" width="30" height="auto" />
                                   <?php }else{ 
                                   
                                       echo '<img src="../../../images/user_image/'.$user['user_image'].'" width="30" height="auto">';
                                   }
                                    ?></td>
                                   <td><?php echo $user['user_fname']; ?></td>
                                   <td><?php echo $user['user_lname']; ?></td>
                                   <td><?php echo $user['role_name']; ?></td>
                                   <td><?php echo $user['user_nic']; ?></td>
                                   <td>
                                    <?php 
                                    if($row['role_id']==1 || $row['user_id']==$user['user_id']){
                                        
                                    }else{
                                    
                                    if($user['user_status']=="Active"){ ?>
                                       <a href="../controller/usercontroller.php?action=Deactive&id=
                                       <?php echo $user['user_id']; ?>">
                                           <button type="button" class="btn btn-danger" onclick="return disMsg('Deactivate');">Deactivate</button>
                                       </a>
                                    <?php }else{  ?>
                                       
                                       <a href="../controller/usercontroller.php?action=Active&id=<?php echo $user['user_id']; ?>">
                                           <button type="button" class="btn btn-success" onclick="return disMsg('Activate');">Activate</button>
                                       </a>
                                    <?php } 
                                    
                               } ?>
                                       <a href="updateuser.php?action=update&id=<?php echo $user['user_id']; ?>&page=<?php echo $page; ?>" >
                                       <button type="button" class="btn btn-warning">Update</button>
                                       </a>
                                       
                                       <button data-toggle="modal" data-target="#myModal" data-id="<?php echo $user['user_id']; ?>" type="button" class="btn btn-primary">View</button>
                                       <?php if($row['role_id']==2 && $row['user_id']!=$user['user_id']){ ?>

                                       <a href="../controller/usercontroller.php?action=Delete&id=<?php echo $user['user_id']; ?>">
                                           <button type="button" class="btn btn-danger" onclick="return disMsg('Delete');">Delete</button>
                                       </a>
                                    <?php } ?>
                                   </td>
                               </tr>
                               <?php } ?>
                           </table>
               <nav class="container">
                   <ul class="pagination pagination-sm">
                       <?php for($i=1;$i<=$nopage;$i++){ ?>
                       <li>
                           <a href="user.php?page=<?php echo $i; ?>">
                               <?php echo $i; ?>
                           </a>
                       </li>
                       <?php } ?>
                   </ul>
               </nav>
               </div>            
           </div>
       </div>
        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content fetched-data">

    </div>

  </div>
</div>
    </body>
</html>