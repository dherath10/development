<?php
include '../common/session.php'; //To call session page
include '../common/dbconnection.php';
include '../common/commonQuery.php';
include '../model/usermodel.php';


$objcq=new commonQuery();
$rowmodule=$_SESSION['rowmodule'];

$objusers=new user();
$resultusers=$objusers->displayAllUsers();

?>
<html>
    <head>
        <title>OnLine Sales System</title>
        
        <link type="text/css" rel="stylesheet" href="../css/layout.css" />
        <link type="text/css" rel="stylesheet" href="../css/style.css" />
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   
        
    </head>
    <body>
        <div id="main">
            <div id="header">
                
                 <?php include '../common/header.php'; ?>            
                
            </div>
            <div id="logged">
 
                <div class="logalign"><i class="glyphicon glyphicon-user"></i> 
     <?php echo $rowuser['user_fname']." ".$rowuser['user_lname']; ?> 
     <a href="../view/logout.php">Logout</a>
 </div>
                
                
                &nbsp;</div>
            <div id="navi">
                <ol class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="user.php">User Management</a></li>
                    <li><a href="#" class="active">Add User</a></li>
                    
                </ol>
                
                
                &nbsp;</div>
            <div id="content">
                <h2 style="text-align: center">
                     Add User</h2>                                   
                <div class="container">
                    <!-- Start Row1 -->
                    <div class="row">                       
                    <div class="col-md-3">
                        <h4>First Name</h4></div>    
                    <div class="col-md-3">
                        <input type="text" name="user_fname" 
                               id="user_fname" placeholder="First Name"
                               class="form-control" />
                    </div> 
                    <div class="col-md-3">
                        <h4>Last Name </h4></div> 
                    <div class="col-md-3">
                        <input type="text" name="user_lname" 
                               id="user_lname" placeholder="Last Name"
                               class="form-control" />
                    </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>                            
                    </div>
                    <!-- Finish Row1 -->
                    <!-- Start Row2 -->
                    <div class="row">                       
                    <div class="col-md-3">
                        <h4>Email</h4></div>    
                    <div class="col-md-3">
                        <input type="text" name="user_email" 
                               id="user_email" placeholder="Email Addresss"
                               class="form-control" />
                    </div> 
                    <div class="col-md-3">
                        <h4>Gender </h4></div> 
                    <div class="col-md-3">
                        <h4>
          <input type="radio" name="gender" id="m" value="Male"/> Male
 <input type="radio" name="gender" id="f" value="Female" 
        /> Female
                        </h4>
                    </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>                            
                    </div>
                    <!-- Finish Row2 -->
                    <!-- Start Row3 -->
                    <div class="row">                       
                    <div class="col-md-3">
                        <h4>DOB</h4></div>    
                    <div class="col-md-3">
                        <input type="date" name="dob" 
                               id="dob"
                               class="form-control" />
                    </div> 
                    <div class="col-md-3">
                        <h4>NIC </h4></div> 
                    <div class="col-md-3">
                        <input type="text" name="nic" 
                               id="user_lname" placeholder="NIC"
                               class="form-control" />
                    </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>                            
                    </div>
                    
                    <!-- Finish Row3s -->
                    <!--STart Row4 -->
                    <div class="row">                       
                    <div class="col-md-3">
                        <h4>Telephone No</h4></div>    
                    <div class="col-md-3">
                        <input type="text" name="user_tel" 
                               id="user_fname" placeholder="Telephone No"
                               class="form-control" />
                    </div> 
                    <div class="col-md-3">
                        <h4>Address </h4></div> 
                    <div class="col-md-3">
                        <textarea name="address" id="address" 
                   class="form-control"   placeholder="Address"></textarea>
                    </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>                            
                    </div>
                    <!-- Finish rOW4 -->
                    <!-- Start Row 5-->
                    <div class="row">                       
                    <div class="col-md-3">
                        <h4>Role</h4></div>    
                    <div class="col-md-3">
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">Select a Role</option>
                        </select>
                    </div> 
                    <div class="col-md-3">
                        <h4>Image </h4></div> 
                    <div class="col-md-3">
                        <input type="file" name="user_image" 
                               id="user_image" placeholder="User Image"
                               class="form-control" />
                    </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>                            
                    </div>
                    <!-- Finish Row5s -->
                </div>    
                           
            </div>
            <div id="footer" class="foo">
                
                 <?php include '../common/footer.php'; ?>  
            </div>
        </div>
        
        
    </body>
     
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
    /*$(document).ready(function(){
    $('form').submit(function(){
        $('#msg').css('text-align','center');
       var uname=$('#uname').val(); //To get Username
       var pass=$('#pass').val(); //To get password
       if(uname=="" && pass==""){  //To check username and password          
           $('#msg').text("User Name and Password are empty");//To display error
           return false; //Stay at same page
       }else if(uname==""){
           $('#msg').text("User Name is empty");//To display error
           return false; //
           
       }else if(pass==""){
           $('#msg').text("Password is empty");//To display error
           return false; //
           
       }  
       
       
       
       
    });
    
});
    */
    </script>
    
    
</html>