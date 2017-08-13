<?php
if(!isset($_SESSION)){
    session_start();    
}
//To set Default Time Zone
date_default_timezone_set("Asia/Colombo");

//session handling - to check whether login or not
include '../../../common/session_handling.php';

$userinfo=$_SESSION['userinfo']; //To get from session
$username=$userinfo['username'];
$user_id=$userinfo['user_id'];
$role_id=$userinfo['role_id'];
$role_name=$userinfo['role_name'];
$user_image=$userinfo['user_image'];

include '../../../common/query.php'; //To call common queries
$obj=new query(); //To create an object using query class
$result=$obj->disRole();//To call a function called disRole from query

$d=date('Y-m-d'); //Current Date

$u_id=$_GET['user_id'];
$resultuser=$obj->viewUser($u_id);
$rowuser=$resultuser->fetch_assoc();

?>
<html>
    <head>
        <title>Elder's Home Management System</title>
        <link rel="icon" href="../../../images/favicon.png" />
  <link rel="stylesheet" type="text/css" 
        href="../../../bootstrap/css/bootstrap.min.css" />
  <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
  </script>
  <script type="text/javascript" src="../../../js/uservalidate.js">
      </script>
  <link rel="stylesheet" type="text/css" href="../../../css/newlayout.css" />
  <script>
  
function showUserName(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getUserName.php?q="+str,true);
xmlhttp.send();
}
  
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
            <li>
                <a href="../../user/view/user.php">User Management</a></li>
            <li class="active">Update User</li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Updating a User</h3>
                    <p style="padding: 10px;">
                        <span id="show" class="alert-danger"></span>
                     <p align="center">
                                <?php if(isset($_GET['msg'])){
                                    $msg=base64_decode($_GET['msg']);                                   
                           ?>
                           <span class="alert-danger">
                               <?php echo $msg; ?></span>   
                                <?php                         
                                }
                              ?>  
                      </p>
                        
                        
                    <!-- Start -->
<form method="post" 
      action="../controller/usercontroller.php?action=update&user_id=<?php echo $u_id; ?>" 
      enctype="multipart/form-data">
                    <div class="container-fluid">
                        <!-- Start 1 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>First Name :  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input type="text" name="fname" id="fname"
                       placeholder="First Name" class="input-sm"
                       value="<?php echo $rowuser['fname']; ?>"/>                         
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Last Name :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input type="text" name="lname" id="lname"
                        placeholder="Last Name" class="input-sm"
                        value="<?php echo $rowuser['lname']; ?>" />                         
                                
                            </div>                                         
                        </div> 
                        <!-- End 1 row -->
                        <div style="clear: both">&nbsp;</div>
                        <!-- Start 2 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Email :  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input type="text" name="email" id="email"
                       placeholder="Email" class="input-sm"
                       value="<?php echo $rowuser['email']; ?>"
                       />                         
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>User Name :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input type="text" name="uname" id="uname"
                                       placeholder="User Name" class="input-sm" 
                                       onkeyup="showUserName(this.value)"
                                        value="<?php echo $rowuser['username']; ?>"
                                        readonly
                                       /> 
                                <p id="txtHint"></p>
                                
                            </div>                                         
                        </div> 
                        <!-- End 2 row -->
                        <div style="clear: both">&nbsp;</div>
                        <!-- Start 3 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>DOB:  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input type="date" name="dob" id="dob"
                       placeholder="DOB" class="input-sm"
                       max="<?php echo $d; ?>" 
                       
                        value="<?php echo $rowuser['dob']; ?>"
                       />                         
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>NIC :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input type="text" name="nic" id="nic"
                        placeholder="NIC" class="input-sm"
                         value="<?php echo $rowuser['nic']; ?>"/>                         
                                
                            </div>                                         
                        </div> 
                        <!-- End 3 row -->
                        <div style="clear: both">&nbsp;</div>
                        <!-- Start 4 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Tel No:  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input type="text" name="tel" id="tel"
                       placeholder="Tel No" class="input-sm"
                        value="<?php echo $rowuser['tel']; ?>"
                       />                         
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Gender :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input type="radio" name="gender" id="male" 
                                       value="M" 
                         <?php if($rowuser['gender']=="M"){
                                       echo "checked"; 
                                        }
                                       ?> /> Male
                                <input type="radio" name="gender" id="female"  
                                       value="F"
                         <?php if($rowuser['gender']=="F"){
                                       echo "checked"; 
                                        }
                                       
                                       ?>
                                       
                                       /> Female
                                
                            </div>                                         
                        </div> 
                        <!-- End 4 row -->
                          <div style="clear: both">&nbsp;</div>
                        <!-- Start 5 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Address </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                <textarea name="address" id="address"> <?php echo $rowuser['address']; ?></textarea>                       
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Uploading an Image :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                
                                <input type="file" name="user_image"
                 id="user_image" />
                                <br />
                                <?php if($rowuser['user_image']==""){ ?>
              <img src="../../../images/user.png" width="50" height="auto" />        
                            <?php } else{ ?>
        <img src="../../../images/user_images/<?php echo $rowuser['user_image'];?>"
                width="50" height="auto" />        
                            <?php } ?> 
                            </div>                                         
                        </div> 
                        <!-- End 5 row -->
                        
                          <div style="clear: both">&nbsp;</div>
                        <!-- Start 6 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Role :  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <select name="role_id" id="role_id"
                                        class="input-sm">
                                    <option value="">Please Select a Role</option>
       <?php 
       //To fetch(retrieve) data from $result varibale per each record and 
       //display all records using while loop
       while($row=$result->fetch_assoc()) { ?>
        <option value="<?php echo $row['role_id']; ?>" 
           
                <?php 
                if($row['role_id']==$rowuser['role_id']){
                    
                  echo "selected";  
                    
                }
                ?>                
                >
        <?php echo $row['role_name']; ?>
        </option> 
                                    
       <?php } ?>
                                </select>            
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                &nbsp;                           
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                &nbsp;
                                
                            </div>                                         
                        </div> 
                        <!-- End 6 row -->
                        <div style="clear: both">&nbsp;</div>
                        <!-- Start 7 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                &nbsp;                             
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
<button type="submit" name="add" class="btn btn-primary">
    <i class="glyphicon glyphicon-save"></i>Continue</button>
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
            <button type="reset" name="reset" class="btn btn-primary">
    <i class="glyphicon glyphicon-trash"></i>Reset</button>           &nbsp;                           
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                &nbsp;
                                
                            </div>                                         
                        </div> 
                        <!-- End 7 row -->
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
</form>
                    <!-- End -->
                    </p>    
                   </div>     
                
                
                
                
            </div>
            
            
        </div>
    </body>
</html>