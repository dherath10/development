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
                    <li><a href="#">User Management</a></li>
                    
                </ol>
                
                
                &nbsp;</div>
            <div id="content">
                <h2 style="text-align: center">
                     User Management</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="adduser.php">
                                <button class="btn btn-primary"> 
                                    <i class="glyphicon glyphicon-user"> </i>
                                    Add User
                                </button>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <form action="searchuser.php">
                                <div class="row">
                                    <div class="col-md-8">
                                <input type="text" class="form-control" 
                                       placeholder="Search">
                                    </div>
                                    <div class="col-md-4">
                                <button class="btn btn-primary">
                                    <i class="glyphicon glyphicon-search"></i>
                                    Search
                                </button>
                                    </div>
                            
                              </div>  
                            </form>                                                
                    </div>  
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                </div> 
                <div class="container">
                    <div class="row">
                       
                        <div class="col-md-12">
        <table class="table table-responsive">
            <tr>
            <th>&nbsp;</th>  
            <th>First Name&nbsp;</th> 
            <th>Last Name&nbsp;</th> 
            <th>Email&nbsp;</th> 
            <th>Role&nbsp;</th> 
            <th>Status&nbsp;</th> 
            <th>&nbsp;</th> 
            </tr>   
            <?php
            while($rowusers=$resultusers->fetch_assoc()) {          
            ?>
            <tr>
                <td><?php echo $rowusers['user_image']; ?></td>
                <td><?php echo $rowusers['user_fname']; ?></td>
                <td><?php echo $rowusers['user_lname']; ?></td>
                <td><?php echo $rowusers['user_email']; ?></td>
                <td><?php echo $rowusers['role_name']; ?></td>
                <td><?php echo $rowusers['user_status']; ?></td>
                <td>
                    <a href="viewuser.php?user_id=<?php echo $rowusers['user_id']; ?>">
                        <button class="btn btn-success">Edit</button>
                    </a>
                    <a href="edituser.php?user_id=<?php echo $rowusers['user_id']; ?>">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                    <a href="deleteuser.php?user_id=<?php echo $rowusers['user_id']; ?>">
                        <button class="btn btn-danger">Edit</button>
                    </a>
                    
                </td>
            </tr>
            <?php } ?>
            
        </table>
                            
                            
                            
                        </div>
                        
                  
                        
                        
                    </div>
                    
                    
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