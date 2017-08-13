<?php
if(!isset($_SESSION)){
    session_start();
 }
 date_default_timezone_set("Asia/Colombo"); //Changing time zone
 $userinfo=$_SESSION['userinfo'];
 $role_id=$userinfo['role_id'];
 
 include '../model/usermodel.php';
 //To get all roles from role table
 $obj=new role();
 $result=$obj->viewRole();
 //To get all modules from role table
 $objm=new module();
 $resultm=$objm->viewModule();
 //To get rights based on Module
 $objr=new rights();
 
 $cdate=date("Y-m-d");
 $ctid=  strtotime($cdate); 
 $tid=60*60*24*365*18+60*60*24*4;
 $ptid=$ctid-$tid;
 $pdate=date('Y-m-d',$ptid);   
         
         
         
         
         
         
         
         
         
         
         
 
 
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
    
<script type="text/javascript" src="../../../js/uservalidate.js">
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
         <li class="active">Add User </li>
                    </ol> 
    <h3 align="center">Add <small>User</small></h3>
                    
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
           
            echo "<span id='msg' class=".$s.">".$msg."</span>";
        }else{
            
            echo '<span class="alert-danger" id="msg"></span>';
            
        }
        
        
        ?>
        

    </div>
                    </div>
                    
                   <!--start -->
                   <form name="adduesr" method="post" 
                         action="../controller/usercontroller.php?action=add" 
                         enctype="multipart/form-data">
                       <div class="row">
                           <div class="col-lg-12 col-sm-12 col-md-12">
                               <p align="center">
                            
                               </p>
                           </div>
                           
                           
                       </div>
                       
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           First Name 
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_fname" id="u_fname" 
                                  placeholder="First Name" class="form-control" /> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Last Name 
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_lname" id="u_lname" 
                                  placeholder="Last Name" class="form-control" /> 
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
                                  placeholder="User Name" class="form-control" /> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Email
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_email" id="u_email" 
                                  placeholder="Email" class="form-control" /> 
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
                          max="<?php // echo $pdate; ?>"
                          /> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           NIC
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_nic" id="u_nic" 
                                  placeholder="NIC" class="form-control" /> 
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
                                  class="form-control" /> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Gender
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="u_gender" id="male" 
                                  type="radio" value="Male"
                                    /> Male
                           <input type="radio" name="u_gender" 
                                  id="female" value="Female" />
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
                               <option value="">Select a Role</option>
                       <?php while($row=$result->fetch_assoc()){ ?>
                          <option value="<?php echo $row['role_id']; ?>">
                                   <?php echo $row['role_name']; ?>
                                   
                               </option>
                       <?php } ?> 
                           </select> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Image
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
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
  echo "<input type='checkbox' name='user_rights[]' value='$r_id' /> ".$rowr['r_name']."<br />";  
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
                                  Save</button>
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
