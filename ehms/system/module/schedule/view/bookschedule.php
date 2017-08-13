<?php
if(!isset($_SESSION)){
    session_start();    
}
// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//session handling - to check whether login or not
include '../../../common/session_handling.php';

$userinfo=$_SESSION['userinfo']; //To get from session
$username=$userinfo['username'];
$user_id=$userinfo['user_id'];
$role_id=$userinfo['role_id'];
$role_name=$userinfo['role_name'];
$user_image=$userinfo['user_image'];

$id=$_GET['id'];
$date=$_GET['date'];

include '../../../common/query.php'; //To call common queries
$obj=new query(); //To create an object using query class
$r=$obj->viewTimeSlot($id);
$rowts=$r->fetch_assoc();

?>
<html>
    <head>
        <title>Elder's Home Management System</title>
        <link rel="icon" href="../../../images/favicon.png" />
  <link rel="stylesheet" type="text/css" 
        href="../../../bootstrap/css/bootstrap.min.css" />
  
  <link rel="stylesheet" type="text/css" href="../../../css/newlayout.css" />
  <link rel="stylesheet" type="text/css" href="../../../css/calender.css" />
  <link href="../../../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    
  <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">  </script>

      <script type="text/javascript" src="../../../js/jquery.autocomplete.pack.js"></script>
<script type="text/javascript" src="../../../js/script.js"></script>

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
            
            <li>
                <a  class="a1" href='../../login/view/dashboard.php'>Dashboard</a></li>
            <li > <a class="a1" href='schedule.php'>Schedule Management</a></li>
            <li class="active">Book a Schedule</li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Booking  <small>Schedule</small></h3>

                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <h4>Schedule Date : </h4>
                                
                            </div>
                            <div class="col-md-2">
                                <h4> <?php echo $_GET['date']; ?></h4>
                                
                            </div>
                            <div class="col-md-2">
                                <h4>Time Slot : </h4>
                                
                            </div>
                            <div class="col-md-2">
                                <h4> <?php echo $rowts['ts_type']; ?></h4>
                                
                            </div>
                        </div>
               
                
                        <div class="row">
                            <div class="col-md-12">
  <table width="50%">
  <tr>
  <td>Donor Type :</td>
  <td>
  <select name="dtype" id="dtype" class="form-control" required>
  <option value="">Select a Donor </option>
  <option value="nd">New Donor</option>
  <option value="ed">Existing Donor</option>
   
  </select>
  </td>
  </tr>
  
  </table>
                            </div>
                            </div>
                        
                  
                         <div class="nd_frm" style="display:none">
  <hr />
  <form method="post" action="../controller/schedulecontroller.php?action=donor&date=<?php echo $date; ?>&id=<?php echo $id;?>" enctype="multipart/form-data">
  
    <table width="80%" align="center">
        <tr>
  <td>Title :</td>
 
  <td>
      <select name="tit" required id="tit" class="form-control">
                                            <option value="">Select a Title</option>
                                            <option value="Rev">Rev.</option>
                                           <option value="Mr">Mr.</option>
                                           <option value="Mrs">Mrs.</option>
                                           <option value="Miss">Miss.</option>
                                          
                                       </select>
      
  </td>
 
  </tr>
    <tr><td>&nbsp;</td></tr>
  <tr>
  <td>Full Name :</td>
 
  <td><input type="text" name="fname" id="fname" class="form-control"
required size="50" class="form-control">
  </td>
 
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
       <td>Email Address :</td>
  
  <td><input type="email" name="email" id="email" class="form-control"
 size="30">
  </td>
      
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
  <td>Telephone No:</td>
 
  <td><input type="text" name="telno" id="telno" class="form-control"
required size="50">
  </td>
 
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
       <td> Address :</td>
  
       <td><input type="text" name="address" id="address" class="form-control"
required size="50">
  </td>
      
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
       <td> NIC or Passport No :</td>
  
       <td><input type="text" name="nic" id="nic" class="form-control"
required size="50">
  </td>
      
  </tr>
    <tr><td>&nbsp;</td></tr>
  <tr>
  <td>Type :</td>
 
  <td>
      <select name="status" required id="status" class="form-control">
                                            <option value="">Select a Type</option>
                                            <option value="1">Annual</option>
                                           <option value="0">Once</option>
                                           
                                          
                                       </select>
      
  </td>
 
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
       <td>  <input type="submit" name="sub" id="sub" class="btn btn-primary"></td>
  
       <td>&nbsp;
  </td>
      
  </tr>
  </table>
      
  </form>
                         </div>
                        
                        
                        
                        <div class="ed_frm" style="display:none">
                            <hr />
    <form method="post" 
    action="../controller/schedulecontroller.php?action=add&date=<?php echo $date; ?>&id=<?php echo $id;?>" enctype="multipart/form-data">

         <table width="80%" align="center">
        
  <td>Full Name OR Telephone No :</td>
 
  <td><input name="title" id="title" class="form-control" autocomplete="off" >
                               <div id="display"></div>
  </td>
 
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
      <td>Type: </td>
      
      <td>
     <select name="status" required id="status" class="form-control">
           <option value="">Select a Type</option>
           <option value="1">Annual</option>
           <option value="0">Once</option>
                                           
                                          
           </select>
          
          &nbsp;</td></tr>
  
  <tr>
       <td>  <input type="submit" name="sub" id="sub" class="btn btn-primary"></td>
  
       <td>&nbsp;
  </td>
      
  </tr>
  </table>
        
        
  </form>
</div>
                        
                        
                        
                
                </div>  
                    
                    
                   </div>
       
            </div>
            
            
        </div>
        
        <script type="text/javascript">

$( "#dtype" ).change(function() {
	var typeid=$(this).val();
	if(typeid=='nd'){
		$(".ed_frm").fadeOut('slow');
		$(".nd_frm").fadeIn('slow');
	}else{
		$(".nd_frm").fadeOut('slow');
	$(".ed_frm").fadeIn('slow');
	}
});

</script>
    </body>
</html>