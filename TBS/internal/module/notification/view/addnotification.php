<?php
include '../../../common/session.php';
include '../../../common/session_handling.php';
include '../../../common/display.php';
$obj = new display();

$result=$obj->displayRole();


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
        <link href="../../../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="../../../js/jquery-2.2.1.min.js">
            
        </script>
        <script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../../js/scripts.js"></script>
        <script type="text/javascript" src="../../../js/ajaxscripts.js"></script>

<!--Validation-->
<script type="text/javascript" src="../../../js/validateuser.js"></script>
<!--Validation-->

<script type="text/javascript" src="../../../js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="../../../js/jquery.autocomplete.pack.js"></script>
<script type="text/javascript" src="../../../js/script.js"></script>

<script>
            function disMsg(m){
                var r=confirm("Do you want to "+m+" User ? :");
                if(r){
                    return true;
                }else{
                    return false;
                }
            }
            
               $(document).ready(function(){
    $('#myModal2').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'fetch_record.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
});
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
                   <?php
               //To include header part
               include '../../../common/sidebar.php'; ?>
               </div>
               <div id="right">
                   <ol class="breadcrumb">
                       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                       <li><a href="../../notification/view/notification.php"><i class="fa fa-dashboard"></i>Notification Management</a></li>
                       <li class="active">Add Notification</li>
                   </ol>
                            <h3 style="padding-left: 15px">Add<small>
                                        Notification</small></h3>
                   <hr />
                   <!--Add user form-->
                   <form method="post" action="../controller/notificationcontroller.php?action=add" enctype="multipart/form-data">
                   <div class="container-fluid">
                       <!--Error-->
                       <div class="row">
                           <div class="col-sm-12 col-md-12 col-lg-12"  style="height: 20px;">
                               <span id="msg" class="alert-warning"></span>
                           </div>
                       </div>
                           
                       <!--error-->
                       
                       <!--ROW 1-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Message </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <textarea name="msg" required=""  class="form-control" ></textarea>          
                               
                           </div>
                           
                               
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4> Category </h4></div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <div id="displayModel">
                                   <select name="no_cat" id="no_cat" class="input-sm" required="">
                                   <option value="reservation">Reservation</option>
                                   <option value="allocation">Allocation</option>
                                   <option value="update">Update</option>
                                   <option value="news">News</option>
                                   <option value="alerts">Alerts</option>
                                   
                               </select>
                           </div>
                           </div>
                           
                       </div>
                       <div style="clea:both">&nbsp;</div>
                       <!--End of ROW 1-->
                       
                       <!--ROW 2-->
                      
                       <!--End of ROW 2-->
                       
                       <!--ROW 3-->
                  
                       <!--End of ROW 3-->
                       
                       <!--ROW 4-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Receiver's Group </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <select name="role_id" type="role_id" class="input-sm">
                                   <option value="0">Select All</option>
                           <?php while ($rowd=$result->fetch_assoc()){ ?>
                                   <option value="<?php echo $rowd['role_id']; ?>">
                                       <?php echo $rowd['role_name']; ?>
                                   </option>
                                   <?php } ?>
                               </select>
                           </div>
                           
                           <div class="col-sm-6 col-md-6 col-lg-6"><h4>
                                   
                               </h4></div>
                       </div>
                       <!--End of ROW 4-->
                       
                       <!--ROW 5-->
                       
                       <!--End of ROW 5-->
                       
                       <!--ROW 6-->
                  
                                                                     
                       
                       <!--End of ROW 6-->
                       
                       <div style="clear: both;">&nbsp;</div>
                       
                       <!--start of--> 
                       <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 al1">
                               <button name="save" id="save" type="submit"
                                       class="btn btn-primary">
                                   <i class="glyphicon glyphicon-save"></i> Save
                               </button>
                           </div>
                       
                           <div class="col-lg-6 col-md-6 col-sm-6 al1">
                               
                           </div>
                       </div>
                       <!--end of--> 
                   </div>
                       
                   </form>
                   <!--End of Add user form-->
               </div>
           </div>
       </div>
        <!-- Modal 1 -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Make</h4>
      </div>
      <div class="modal-body" style="text-align: center">
          <form method="post" action="../controller/vehiclecontroller.php?action=make">
              <div class="row" style="text-align: center">
              <div class="col-lg-3"><h4>Make</h4></div> <div class="col-lg-3"><input type="text" class="input-sm" name="make_name" id="make_name" required=""></div>
          </div>
              <BR />
          <div class="row">
              <div class="col-lg-3"></div> <div class="col-lg-3"><button type="submit" class="btn btn-primary">Add</button></div>
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        
<!-- Modal 1 -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Make</h4>
      </div>
      <div class="modal-body" style="text-align: center">
          <form method="post" action="../controller/vehiclecontroller.php?action=model">
          <div class="row">
              <div class="col-lg-3"><h4>Make :
              
              <select name="make_id" id="make_id" class="input-sm">
                                   <option value="">Select a Make</option>
                                   <?php while($rowm1=$make1->fetch_assoc()){?>
                                   <option value="<?php echo $rowm1['make_id']; ?>">
                                       <?php echo $rowm1['make_name']; ?></option>
                                   <?php } ?>
                               </select>
              
              
              </div>
          </div>
              <div class="row">
              <div class="col-lg-3"><h4>Type :
              
              <select name="class_id" id="class_id" class="input-sm">
                                   <option value="">Select a Type</option>
                                   <option value="Car">Car</option>
                                   <option value="Van">Van</option>
                                    
                               </select>
              
              
              </div>
          </div>
               <div class="row">
              <div class="col-lg-3"><h4>Model :<input type="text" class="input-sm" name="model_name" id="model_name" required=""></h4></div>
          </div>
          <div class="row">
              <div class="col-lg-3"></div> <div class="col-lg-3"><button type="submit" class="btn btn-primary">Add</button></div>
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                
    </body>