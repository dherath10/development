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
 echo $page1; 
include '../model/usermodel.php';
$obj=new user();
//To get all users
$resulta=$obj->viewAllUser();
$nor=$resulta->num_rows; //To get no of records in user table
$nopage=ceil($nor/5); //To identify how many pages

/*$sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id "
          . "ORDER BY u.user_id DESC LIMIT ".$page1.",5";
$result=$con->query($sql);
*/
$result=$obj->viewUserPage($page1);

?>
<html>
    <head> 
        <title>OnLine Sale Management System</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" 
          href="../../../css/mainlayout.css" />
     
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
             <a href="../view/user.php">
             User Management
             </a></li>
                    </ol> 
    <h3 align="center">User <small>Management</small></h3>
                    
                </div>
                <HR />
                
                <div>
                    <!-- Start -->
                    <div class="row" style="padding-left: 20px">
                        <div class="col-lg-6 col-sm-6 col-md-6">  
                            <?php if($userinfo['role_id']==1){
                                //To restrict - only for admin
                                ?>
                            <a href="../../user/view/adduser.php">
                                <button class="btn btn-primary" 
                                        type="button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    Add                                    
                                </button>               
                               </a> 
                            <?php } ?>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <form action="../controller/usercontroller.php?action=search"
                                  method="post">
                            <h4>Search : 
                                <input type="text" name="search" id="search"
                                 class="input-sm"      placeholder="Keyword" 
                                 onkeyup="searchUsers(this.value)" />
                                                          
                            </h4>
                            </form>
                        </div>
                    </div>
                   <!-- End -->
                <div class="row">
    <div class="col-lg-12" style="text-align: center">
        <?php
        if(isset($_GET['m'])){
            $msg=  base64_decode($_GET['m']); //To decode
            $status=$_GET['status'];
            if($status==0){ 
                $s="alert-danger";
            }else{
                 $s="alert-success";
            }
           
            echo "<span class=".$s.">".$msg."</span>";
        }  
               ?>   
     <br />
    </div>
                    </div>
                   <!--start table -->
                 <div id="showUsers">
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
                     <?php } ?> 
                       
                       
                                                   
                       
                       <!-- end 2 row -->
                
                   <!-- End Table-->           
     <nav class="container">
           <ul class="pagination pagination-sm">  
               <?php for($i=1;$i<=$nopage;$i++){ ?>
               <li>
                   <a href="user.php?page=<?php echo $i; ?>">
                   <?php echo $i; ?>
                   </a></li>
               <?php } ?>
           </ul>
     </nav>
                 
           </div>          
                    
                </div>
                
            </div>      
            <div id="footer">
                
               <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
        
    </body>
    
</html>
