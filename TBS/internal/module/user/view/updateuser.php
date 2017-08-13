<?php
include '../../../common/session.php';
include '../../../common/session_handling.php';
include '../../../common/display.php';
$user_id=$_GET['id'];
$page=$_GET['page'];
$obj = new display();
$r=$obj->displayRole();
$d=$obj->displaydistrict();
$u=$obj->displayaUser($user_id);
$rowu=$u->fetch_assoc();
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
    <script type="text/javascript" src="../../../js/ajaxscripts.js"></script>
    <script type="text/javascript" src="../../../js/scripts.js"></script>
<!--Validation-->
<script type="text/javascript" src="../../../js/validateuser.js"></script>
<!--Validation-->
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
                   <?php
               //To include header part
               include '../../../common/sidebar.php'; ?>
               </div>
               <div id="right">
                   <ol class="breadcrumb">
                       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                       <li><a href="../../user/view/user.php"><i class="fa fa-dashboard"></i>User</a></li>
                       <li class="active">Update User</li>
                   </ol>
                            <h3 style="padding-left: 15px">Update<small>
                                        User</small></h3>
                   <hr />
                   <!--Update user form-->
                   <form method="post" action="../controller/userController.php?action=update&user_id=<?php echo $rowu['user_id']; ?>&page=<?php echo $page; ?>" enctype="multipart/form-data">
                   <div class="container-fluid">
                       <!--Error-->
                       <div class="row">
                           <div class="col-sm-12 col-md-12 col-lg-12"  style="height: 20px;">
                               <span id="msg" class="alert-warning"></span>
                           </div>
                       </div>
                           
                       <!--error-->
                       
                       <!--ROW 1-->
                  
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>First Name </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input type="text" name="user_fname" id="user_fname" class="input-sm" value="<?php echo $rowu['user_fname']; ?>">
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Last Name </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input type="text" name="user_lname" id="user_lname" class="input-sm" value="<?php echo $rowu['user_lname']; ?>">
                           </div>
                       </div>
                       <!--End of ROW 1-->
                       
                       <!--ROW 2-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>User Name </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input type="text" name="user_name" id="user_name" class="input-sm" value="<?php echo $rowu['user_name']; ?>">
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Email </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input type="text" name="user_email" id="user_email" class="input-sm" value="<?php echo $rowu['user_email']; ?>">
                           </div>
                       </div>
                       <!--End of ROW 2-->
                       
                       <!--ROW 3-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>DOB </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input type="date" name="dob" id="dob" class="input-sm" value="<?php echo $rowu['dob']; ?>">
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Gender </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3" >
                               <h4>
                               <?php if($rowu['gender']=="Male"){ ?>
                                   <input type="radio" name="gender" id="male" value="Male" checked> Male
                                   <input type="radio" name="gender" id="female" value="Female"> Female
                               <?php } else if ($rowu['gender']=="Female") { ?>
                                   <input type="radio" name="gender" id="male" value="Male"> Male
                                   <input type="radio" name="gender" id="female" value="Female" checked> Female
                                   <?php } ?>
                               </h4>
                           </div>
                       </div>
                       <!--End of ROW 3-->
                       
                       <!--ROW 4-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>NIC </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input type="text" name="nic" id="nic" class="input-sm" value="<?php echo $rowu['user_nic']; ?>">
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Role </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <select name="role_id" id="role_id" class="input-sm">
                                  <?php while ($rowd=$r->fetch_assoc()){ ?>
                                   <option value="<?php echo $rowd['role_id']; ?>"
                                          <?php if($rowd['role_id']==$rowu['role_id']) echo "selected"; ?> >
                                       <?php echo $rowd['role_name']; ?>
                                   </option>
                                   <?php } ?> 
                               </select>
                           </div>
                       </div>
                       <!--End of ROW 4-->
                       
                       <!--ROW 5-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>User Image </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <div>
                                   <?php if($rowu['user_image']==""){ ?>
                                   <img src="../../../images/user_image/donor.png" width="50" height="50" alt="User Image" id="img_prev">
                                   <?php }else{ ?>
                                   <img src="../../../images/user_image/<?php echo $rowu['user_image']; ?>" width="50" height="50" alt="User Image" id="img_prev">
                                   <?php } ?>
                               </div>
                               
                               <input type="file" name="user_image" id="user_image" class="input-sm" placeholder="image" onchange="readURL(this);">
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Tel No: </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input type="text" name="user_tel_no" id="user_tel_no" class="input-sm" value="<?php echo $rowu['user_tel_no']; ?>">
                           </div>
                       </div>
                       <!--End of ROW 5-->
                       
                       <!--ROW 6-->
                       <div class="row">
                          <div class="col-sm-3 col-md-3 col-lg-3"><h4>District </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <select name="district_id" id="district_id" class="input-sm"
                                       onchange="showProvince(this.value);">
                                   
                                   <?php while ($rowdis=$d->fetch_assoc()){ ?>
                                   <option value="<?php echo $rowdis['district_id']; ?>"
                                          <?php if($rowdis['district_id']==$rowu['district_id']) echo "selected"; ?> >
                                       <?php echo $rowdis['district_name']; ?>
                                   </option>
                                   <?php } ?>
                               </select>
                           </div>
                          
                          <div class="col-sm-3 col-md-3 col-lg-3"><h4>Province </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <span id="showpro" ><?php echo $rowu['province_name'] ?></span>
                           </div>
                       </div>
                                                                     
                       
                       <!--End of ROW 6-->
                       
                       <div style="clear: both;">&nbsp;</div>
                       
                       <!--start of--> 
                       <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 al1">
                               <button name="save" id="save" type="submit"
                                       class="btn btn-primary">
                                   <i class="glyphicon glyphicon-edit"></i> Update
                               </button>
                           </div>
                       
                           <div class="col-lg-6 col-md-6 col-sm-6 al1">
                               <button name="save" id="save" type="reset"
                                       class="btn btn-primary">
                                   <i class="glyphicon glyphicon-remove"></i> Clear
                               </button>
                           </div>
                       </div>
                       <!--end of--> 
                   </div>
                       
                   </form>
                   <!--End of update user form-->
               </div>
           </div>
       </div>
    </body>
