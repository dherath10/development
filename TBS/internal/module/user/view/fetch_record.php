<?php

if($_POST['rowid']) {
     $id = $_POST['rowid']; //escape string
    // Run the Query
    // Fetch Records
    // Echo the data you want to show in modal
     include '../../../common/display.php';
$obj= new display();
$result=$obj->displayaUser($id);
$rowu=$result->fetch_assoc();
 }
?>

        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title"><?php echo $rowu['user_fname'];?>'s Information</h4>
      </div>
      <div class="modal-body">
        <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>First Name : </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['user_fname']; ?> </h4>
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Last Name : </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['user_lname']; ?></h4>
                           </div>
                       </div>
                       <!--End of ROW 1-->
                       
                       <!--ROW 2-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>User Name : </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['user_name']; ?> </h4>
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Email : </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['user_email']; ?></h4>
                           </div>
                       </div>
                       <!--End of ROW 2-->
                       
                       <!--ROW 3-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>DOB : </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['dob']; ?></h4>
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Gender : </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3" >
                               <h4><?php echo $rowu['gender']; ?></h4>
                           </div>
                       </div>
                       <!--End of ROW 3-->
                       
                       <!--ROW 4-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>NIC : </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['user_nic']; ?></h4>
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Role : </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['role_name']; ?></h4>
                           </div>
                       </div>
                       <!--End of ROW 4-->
                       <!--ROW 5-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>User Image </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <div>
                                   <?php if($rowu['user_image']==""){ ?>
                                   <img src="../../../images/user_image/donor.png" width="50" height="50" alt="User Image">
                                   <?php }else{ ?>
                                   <img src="../../../images/user_image/<?php echo $rowu['user_image']; ?>" width="50" height="50" alt="User Image" >
                                   <?php } ?>
                               </div>
                               
                               
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Tel No: </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['user_tel_no']; ?></h4>
                           </div>
                       </div>
                       <!--End of ROW 5-->
                       
                       <!--ROW 6-->
                       <div class="row">
                          <div class="col-sm-3 col-md-3 col-lg-3"><h4>District </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['district_name']; ?></h4>
                           </div>
                          
                          <div class="col-sm-3 col-md-3 col-lg-3"><h4>Province </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <h4><?php echo $rowu['province_name'] ?></h4>
                           </div>
                       </div>
                                                                     
                       
                       <!--End of ROW 6-->
         
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>