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
         <li class="active">Edit User </li>
                    </ol> 
    <h3 align="center">Edit <small>User</small></h3>
                    
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
      <form name="edituesr" method="post" 
           action="../controller/usercontroller.php?action=edit&user_id=<?php echo $user_id; ?>" 
                         enctype="multipart/form-data">
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           First Name 
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_fname" id="u_fname" 
                                  placeholder="First Name" 
                                  class="form-control"
                                  value=" <?php echo $rowu['u_fname']; ?>"/> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Last Name 
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_lname" id="u_lname" 
                                  placeholder="Last Name" 
                                  class="form-control"
                                  value="<?php echo $rowu['u_lname']; ?>"/> 
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
                           <input name="username" id="username" 
                                  placeholder="User Name"
                                  class="form-control"
                                  value="<?php echo $rowu['username']; ?>"/> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Email
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_email" id="u_email" 
                                  placeholder="Email" 
                                  class="form-control"
                                  value= "<?php echo $rowu['u_email']; ?>"/> 
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
                           <input name="u_dob" id="u_dob" 
                                  type="date"      
                          placeholder="DOB" class="form-control"
                          
                          value="<?php echo $rowu['u_dob']; ?>"
                          /> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           NIC
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_nic" id="u_nic" 
                                  placeholder="NIC" class="form-control"
                                  value="<?php echo $rowu['u_nic']; ?>"
                                  /> 
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
                           <input name="u_telno" id="u_telno" 
                                  placeholder="Telephone No" 
                                  class="form-control"
                                  value="<?php echo $rowu['u_telno']; ?>"/> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Gender
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_gender" id="male" 
                                  type="radio" value="Male" 
                    <?php if(strtolower($rowu['u_gender'])=="male") { ?>
                               
                                  checked
                    <?php } ?>       
                                    /> Male
                           <input type="radio" name="u_gender" 
                                  id="female" value="Female"
                    <?php if(strtolower($rowu['u_gender'])=="female") { ?>
                               
                                  checked
                    <?php } ?>
                                  
                                  />
                           Female
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
                           <select name="role_id" id="role_id" 
                               onchange="showRights(this.value)">
                              
                       <?php while($row=$result->fetch_assoc()){ ?>
                          <option value="<?php echo $row['role_id']; ?>" 
                                  
            <?php if($rowu['role_id']==$row['role_id']){
                echo "SELECTED";
            }
                   ?>               
                                  
                                  
                                  >
                                   <?php echo $row['role_name']; ?>
                                   
                               </option>
                       <?php } ?> 
                           </select> 
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
                           <input name="u_image" id="u_image" type="file"
                                  placeholder="Image" class="form-control" /> 
                           
                           
                           
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
                                style="min-height: 120px">
                           <b>
                           <?php
                           echo $rowm['module_name'];
                           $m=$rowm['module_id'];
                           
                           $resultr=$objr->viewModuleRights($m);
                           ?>
                               </b><br />
                           
                               <?php while($rowr=$resultr->fetch_assoc()){
                               $r_id=$rowr['r_id'];
           $nor=$objr->checkRight($r_id,$user_id);
           //echo $nor;
           $checked="";
           if($nor==1){
               $checked="checked";
               
           }
  echo "<input type='checkbox' name='user_rights[]' "
           . "value='$r_id' ".$checked." /> ".$rowr['r_name']."<br />";  
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
                           <button type="submit" 
                                   class="btn btn-primary">
                               <i class="glyphicon glyphicon-save"> </i>  
                                  Edit</button>
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           &nbsp;
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <button type="reset" 
                                   class="btn btn-primary">
                               <i class="glyphicon glyphicon-refresh"> </i>  
                                  Reset</button> 
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>      
                       
                   </form>       
                   <!-- End -->
                 
                    
                    
                </div>
                
            </div>      
            <div id="footer">
                
               <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
        
    </body>
    
</html>
