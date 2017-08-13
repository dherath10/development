<?php
if(!isset($_SESSION)){
    session_start();
 }
 
 $userinfo=$_SESSION['userinfo'];
 $role_id=$userinfo['role_id'];
 $user_id=$_GET['user_id'];
 
 include '../model/usermodel.php';
 //To get all roles from role table
 $obj=new role();
 $result=$obj->viewRole();
 //To get all modules from role table
 $objm=new module();
 $resultm=$objm->viewModule();
 //To get rights based on Module
 $objr=new rights();
 
 //To get individual user's infor
 $ob=new user();
 $resultu=$ob->viewUser($user_id);
 $rowu=$resultu->fetch_assoc();
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
    //Ajax for role Rights
function showRights(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("showrights").innerHTML="";
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
    document.getElementById("showrights").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getRights.php?q="+str,true);
xmlhttp.send();
}
</script>
    
    
    
    </head>
    <body>
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
         <li><a href="../../user/view/user.php">User Management</a></li>
         <li class="active">View User </li>
                    </ol> 
    <h3 align="center">View <small>User</small></h3>
                    
                </div>
                <HR />
                
                <div>
                    
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
        
        
    <br /><br />
    </div>
                    </div>
                    
                   <!--start -->
                   
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           First Name 
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <?php echo $rowu['u_fname']; ?>
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Last Name 
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <?php echo $rowu['u_lname']; ?> 
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>
                  <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           User Name 
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                          <?php echo $rowu['username']; ?>
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Email
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <?php echo $rowu['u_email']; ?>
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>
                  <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           DOB
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <?php echo $rowu['u_dob']; ?>
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           NIC
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <?php echo $rowu['u_nic']; ?> 
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>
                  <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Telephone No 
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                          <?php echo $rowu['u_telno']; ?>
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Gender
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <?php echo $rowu['u_gender']; ?>
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>
       <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                         Role
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <?php echo $rowu['role_name']; ?>
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Image
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                          
                            <?php 
            
                   if($rowu['u_image']==""){ //Image is not existing in table ?>
                           <p>    
                            <img src="../../../images/user.png"
                                height="35" width="auto" />
                           </p>
                   <?php }else{ ?>
                <p>          
     <img src="../../../images/user_images/<?php echo $rowu['u_image'] ?>"
                                height="35" width="auto" />           
                </p>
                   <?php } ?>
                           
                           
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>                
                 <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                 
                 <div class="row">
                   <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                   <div class="col-lg-10 col-sm-10 col-md-10">
                       User Rights:
                       
                       <hr />
                       <div id="showrights">
                       <div class="row">
                       <?php while($rowm=$resultm->fetch_assoc()){
                         ?>
                           <div class="col-lg-3 col-sm-3 col-md-3"
                                style="min-height: 50px">
                           <b>
                           <?php
                           echo $rowm['module_name'];
                           $m=$rowm['module_id'];
                           
                           $resultr=$objr->viewUserRights($m,$user_id);
                           ?>
                               </b><br />
                           
                               <?php while($rowr=$resultr->fetch_assoc()){
                               $r_id=$rowr['r_id'];
                            echo $rowr['r_name']."<br />";  
                           }
                           ?>
                                                        
                       </div>                                                 
                      <?php } ?>
                       </div>
                       </div>
                       
                  &nbsp;</div>
                   
                   <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                     
                                   
                 </div>
                 
                 <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           &nbsp;
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                          
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           &nbsp;
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                          
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>      
                       
                    
                   <!-- End -->
                 
                    
                    
                </div>
                
            </div>      
            <div id="footer">
                
               <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
        
    </body>
    
</html>
