<?php
include '../../../common/session.php';
include '../../../common/session_handling.php';
include '../../../common/display.php';
$user_name=$row['user_name'];
$obj = new display();
$result=$obj->viewLog($user_name);
$i=0;

                           
                            while($arr=$result->fetch_array()){
                            $i++;
                            if($i==2){
                            $_SESSION['logInfo']=$arr[1]." ".$arr[2];
                                 }
                             }
                          
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
        <script type="text/javascript" src="../../../js/scripts.js">
        </script>

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
                   <!--Start-->
                        <?php
                        //To include sidebar
                        include '../../../common/sidebar.php'; ?>
                   <!--End-->
               </div>
               <div id="right">
                   <ol class="breadcrumb">
                      
                       <li><a href="../../login/view/dashboard.php">Home</a></li>
                       <li><a href="../../report/view/report.php">Report</a></li>
                       <li class="active">Booking Analysis</li>
                       
                   </ol>
                            <h3 style="padding-left: 15px">Report <small>
                                        Booking Analysis</small></h3>
                   <div class="container-fluid">
                   
                   
                   <?php if($row['role_id']==1){ ?>
                       <form action="bookinganalysisbydates.php" method="post"> 
                       <div class="row">
                           <div class="col-md-4">
                               <h4>    From :<input type="date" name="from"
                                                    id="from" class="input-sm" 
                                                    required
                                 onchange="getFrom(this.value)"/></h4>                                        
                           </div>
                           <div class="col-md-4">
                 <h4>    To : <span id="showto">
                         <input type="date" class="input-sm"
                                    name="to" id="to"
                                     required/>
                     </span>
                 </h4>                                        
                           </div>
                           <div class="col-md-4">
                               <h4>    <input type="submit" class="btn btn-success 
                                              input-sm" name="Generate" value="Genarate" /></h4>                                        
                           </div>
                       </div>
                       </form>
                       <form action="bookinganalysisbyyear.php">
                       <div class="row">
                           <div class="col-md-4">
                               <h4>    Year :  
                                   
                                   <select name="year" class="input-sm"
                                           required>
                                       <option value="">Select a Year</option>
                            <?php for($i=date("Y");$i>date("Y")-4;$i--){ ?>
                                
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>               
                                
                           <?php  } ?>
                                       
                                       
                                       
                                       
                                       
                                   </select>
                           </div>
                           <div class="col-md-4">
                 <h4>   (No of Booking per Month) </h4>                                        
                           </div>
                           <div class="col-md-4">
                               <h4>    <input type="submit" class="btn btn-success 
                                              input-sm" name="Generate" value="Genarate" /></h4>                                        
                           </div>
                       </div>
                       </form>
                  <?php } ?>
                   
                   </div>
                   
               </div>
           </div>
       </div>
    </body>