<?php

//To include session part
 include'../../../common/session.php';
 include'../../../common/session_handling.php';
 include '../../../common/display.php';
 
 $obj=new display();
 $r=$obj->displayRole();
 $d=$obj->displayDistrict();

 ?>
<html>
    <head>
        <title> Taxi Booking System for Colombo Cabs </title>
        <!-- favicon changing icons in the title -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../../images/yellow-taxi-10035627.jpg" />
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../../../css/layout.css" />

         <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js"></script>
         <script type="text/javascript" src="../../../js/scripts.js">
         </script>
         <script type="text/javascript" src="../../../js/ajaxscripts.js">
         
         </script>
<!--         Ajax-->
         <script type="text/javascript">
function showProvince(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("showpro").innerHTML="";
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
    document.getElementById("showpro").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../../../common/getProvince.php?q="+str,true);
xmlhttp.send();
}
</script>
<script type="text/javascript" src="../../../js/validate_booking.js"></script>
    </head>
    <body>
        <div id="newmain">
            <div id="newheader">
                <!--To include header part -->
                <?php include'../../../common/header.php';?>

            </div>
            <div id="newcontents">
                <div id="newsidebar">
                      <!-- start --->
                     <?php
                      include '../../../common/sidebar.php';
                     ?>
                    <!--- end -->
                </div>
                <div id="newright">
                    <ol class="breadcrumb">
                        <li><a href="../../login/view/dashboad.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                         <li><a href="../../user/view/user.php"><i class="fa fa-dashboard"></i>User Management</a></li>
                        <li class="active">Add User</li>
                    </ol>
                    <h2 style="padding-left:15px;">Add <small>Booking</small></h2>
   <hr/>
   <form method="post" action="../controller/booking_controller.php?action=add" enctype="multipart/form-data"  name="form" id="form">
                    <div class="container">
                        
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="height: 20px">
                                <span id="msg" class="alert-warning"></span>
                            </div>
                        </div>
                        
                        
                        <!--- start row 1-->
                        <div class="row">
                            
                            <div class="col-sm-3 col-md-3 col-lg-3">Title &nbsp;&nbsp;
                            <select name="title" required id="title" class="form-control">
                            <option>Set a title</option>
                            <option>Rev.</option>
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Miss.</option>

                        </select>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">First Name &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                <input type="text" name="user_fname" id="user_fname" class="form-control" placeholder="First Name"/>
                            </div>

                            <div class="col-sm-3 col-md-3 col-lg-3">Last Name &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                <input type="text" name="user_lname" id="user_lname" class="form-control" placeholder="Last Name" />
                            <!--</div>-->
                                
                                <div id="showName"></div>
                            </div>
                        </div>
                        <br/>
                              <!-- end row 1 --->
                              <!--- start row 2-->
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3">NIC &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                <input type="text" name="nic" id="nic" class="form-control" placeholder="NIC"/>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">Email &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Email"/>
                            </div>

                            <div class="col-sm-3 col-md-3 col-lg-3">Telephone &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                            <input type="text" name="telno" id="telno" class="form-control"/>
                            </div>
                        </div>
                        <br/>
                              <!-- end row 2 --->
                              <!--- start row 3-->
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3">From &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                <input type="text" name="from" id="from" class="form-control" />
                            </div>

                            <div class="col-sm-3 col-md-3 col-lg-3">To &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                <input type="text" name="to" id="to" class="form-control" />
                               
                            </div>
                            
                            <div class="col-sm-3 col-md-3 col-lg-3">Package &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                <select name="district_id" id="district_id" class="form-control">
                                    <option value="">Select a Class</option>
                                    <option value="">Package 01</option>
                                    <option value="">Package 02</option>
                                    <option value="">Package 03</option>
                                    <option value="">Package 04</option>
                                    <option value="">Package 05</option>
                                    <option value="">Package 06</option>
                                    <option value="">Package 07</option>
                                    <option value="">Package 08</option>
                                    <option value="">Package 09</option>
                                    <option value="">Package 10</option>
                                </select>
                               
                            </div>
                        </div>
                        <br/>
                              <!-- end row 3 --->
                              <!--- start row 4-->
                        
                              <!-- end row 4 --->
                               <!--- start row 5-->
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3">Date &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                
                                <input type="date" name="res_date" id="res_date" class="form-control" placeholder="Image"/>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">Time &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                            <input type="time" name="res_time" id="res_time" class="form-control" placeholder="Tel No" />
                            </div>

                        </div>
                               <br/>
                              <!-- end row 5 --->
                              <!--- start row 6-->
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3">Vehicle Class &nbsp;&nbsp;
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                <select name="class" id="class" class="form-control">
                                    <option value="">Select a Class</option>
                                    <option value="">Car</option>
                                    <option value="">Van</option>
                                    <option value="">Bus</option>
                                </select>

                            </div>
                            
                            <div class="col-sm-3 col-md-3 col-lg-3">A/C Type &nbsp;&nbsp; 
                            <!--<div class="col-sm-3 col-md-3 col-lg-3">-->
                                <!--<span id="showpro"></span>-->
                                <select name="ac_type" id="ac_type" class="form-control">
                                    <option value="">Select a Class</option>
                                    <option value="">Non-AC</option>
                                    <option value="">Front-AC</option>
                                    <option value="">Dual-AC</option>
                                </select>
                            </div>

                    </div>
                              <br/>
                              
                              <div class="row">
                    <div class="col-sm-8" class="form-group">

                        <span class="quick_book_form_boot">  Remarks (if any):<br/></span>
                        <textarea rows="5" cols="75" name="remarks" id="remarks" class="form-control"></textarea>

                    </div>
                </div>
                              <br/>
                              <div class="row">
                            
                              <!-- end row 6 --->
                              <div style="clear: both"></div>
                              <!-- start row 7 --->
                              <div class="col-lg-6 col-md-6 col-md-6">
                                  <button name="submit" id="submit" type="submit" class="btn btn-primary">
                                      <i class="glyphicon glyphicon-save"></i>Add
                                  </button>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <button name="clear" id="clear" type="reset" class="btn btn-primary">
                                      <i class="glyphicon glyphicon-remove"></i>Clear
                                  </button>
                              </div>
                              
                </div>
           <!-- End form-->         
            </div>
   </form>
        </div>
    </body>

</html>