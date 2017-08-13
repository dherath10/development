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
$key=$_GET['q'];
include '../model/usermodel.php';
$obj=new user();
$result=$obj->searchUsers($key);
$nor=$result->num_rows;

?>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6">
                Search By : <?php echo $key; ?>
                
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                Number of Records: <?php echo $nor; ?>
            </div>
    
    </div>
    
    <?php if($nor!=0){ ?>
    
    
<div class="row">
                       <div class="col-lg-2 col-sm-2 col-md-2"> &nbsp;          
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           <h4>Name</h4>         
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           <h4>Email </h4>         
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2"><h4> Role </h4>         
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2"><h4> NIC   </h4>      
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2"> &nbsp;          
                       </div>
                   </div>
                   <hr />
                       <!-- start 2 row -->
                     <?php while($row=$result->fetch_assoc()) { ?>  
                       <div class="row">
                       <div class="col-lg-2 col-sm-2 col-md-2"> 
                   <?php 
            
                   if($row['u_image']==""){ //Image is not existing in table ?>
                           <p align="center">    
                            <img src="../../../images/user.png"
                                height="35" width="auto" />
                           </p>
                   <?php }else{ ?>
                <p align="center">          
     <img src="../../../images/user_images/<?php echo $row['u_image'] ?>"
                                height="35" width="auto" />           
                </p>
                   <?php } ?>
                       </div>
   <div class="col-lg-2 col-sm-2 col-md-2">
       <?php echo $row['u_fname']." ".$row['u_lname']; ?>
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
      <?php echo $row['u_email']; ?>          
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2"> 
       <?php echo $row['role_name']; ?>          
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1"> 
     <?php echo $row['u_nic']; ?>          
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
       <a href="../view/viewuser.php?user_id=<?php echo $row['user_id'] ?>&action=view">
    <button class="btn btn-success btn-sm">View</button>
</a>
                           
                           &nbsp;
                           
    <a href="../view/edituser.php?user_id=<?php echo $row['user_id'] ?>&action=edit">
    <button class="btn btn-success btn-sm">Edit</button>
</a>
           &nbsp;
           
    <?php 
    if($row['user_id']!=$u_id) {
    if($row['u_status']=="Active") { ?>
           
            <a href="../controller/usercontroller.php?user_id=<?php echo $row['user_id'] ?>&action=deactivate&page=<?php echo $page;?>">
                <button class="btn btn-danger btn-sm" 
                        onclick="return confirmMsg('Deactivate')">Deactivate</button>
</a>
           
    <?php } else { ?>
      
  <a href="../controller/usercontroller.php?user_id=<?php echo $row['user_id'] ?>&
     action=activate&page=<?php echo $page; ?>">
    <button class="btn btn-primary btn-sm"
            onclick="return confirmMsg('Activate')">Activate</button>
</a>
           
    <?php } } ?>
                           
                       </div>
                       </div>
                     <?php } 
    }else{ ?>
     <hr />
                       <div class="alert label-danger" 
                            style="text-align: center">
                           No records
                           
                       </div>
                       
    <?php } ?>
                   
                       
                       
</div>                                                  
                       
                       <!-- end 2 row -->
                
                   <!-- End Table-->   

