<?php
include '../../../common/session.php';
include '../../../common/session_handling.php';
include '../../../common/display.php';
$obj = new display();

$make=$obj->displayMake();
$make1=$obj->displayMake();

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
                       <li><a href="../../vehicle/view/vehicle.php"><i class="fa fa-dashboard"></i>Vehicle</a></li>
                       <li class="active">Add Vehicle</li>
                   </ol>
                            <h3 style="padding-left: 15px">Add<small>
                                        Vehicle</small></h3>
                   <hr />
                   <!--Add user form-->
                   <form method="post" action="../controller/vehiclecontroller.php?action=add" enctype="multipart/form-data">
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
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Make </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <select name="make_id" id="make_id" class="input-sm" onchange="getModel(this.value)">
                                   <option value="">Select a Make</option>
                                   <?php while($rowm=$make->fetch_assoc()){?>
                                   <option value="<?php echo $rowm['make_id']; ?>"><?php echo $rowm['make_name']; ?></option>
                                   <?php } ?>
                               </select>
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"> Add</button>
                           </div>
                           
                               
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4> Model </h4></div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <div id="displayModel">
                               <select name="model_id" id="model_id" class="input-sm">
                                   <option value="">Select a Model</option>
                                   
                               </select>
                           </div>
                           </div>
                           
                       </div>
                       <!--End of ROW 1-->
                       
                       <!--ROW 2-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Vehicle Number </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input type="text" name="v_no" id="v_no" class="input-sm" placeholder="Vehicle No.">
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Engine No </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input name="e_no" id="e_no" class="input-sm" placeholder="Engine No">
                           </div>
                           
                          
                       </div>
                       <!--End of ROW 2-->
                       
                       <!--ROW 3-->
                       <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3"><h4>Chassis No </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input name="c_no" id="c_no" class="input-sm" placeholder="Chassis No">
                           </div>
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>No of Seats </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input type="text" name="nos" id="nos" class="input-sm" size="3">
                           </div>
                       </div>
                       <!--End of ROW 3-->
                       
                       <!--ROW 4-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Fuel Type </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <select name="ftype" type="ftype" class="input-sm">
                                   <option value="">Select a Fuel Type</option>
                                   <option value="Diesel">Diesel</option>
                                   <option value="Petrol">Petrol</option>
                                   <option value="Hybrid">Hybrid</option>
                               </select>
                           </div>
                           
                           <div class="col-sm-6 col-md-6 col-lg-6"><h4>
                                   <input type="radio" name="v_ac" id="nac" value="Non AC"> Non AC 
                                   <input type="radio" name="v_ac" id="fac" value="Front AC"> Fron AC 
                                   <input type="radio" name="v_ac" id="dac" value="Dual AC"> Dual AC
                               </h4></div>
                       </div>
                       <!--End of ROW 4-->
                       
                       <!--ROW 5-->
                       <div class="row">
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Vehicle Image </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <img id="img_prev" >
                               <input type="file" name="v_image" class="input-sm" onchange="readURL(this);">
                           </div>
                           
                           <div class="col-sm-3 col-md-3 col-lg-3"><h4>Transmission Type </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <select name="v_trans" id="v_trans" class="input-sm">
                                   <option value="">Select a Transmission Type</option>
                                   <option value="Manual">Manual</option>
                                   <option value="Auto">Auto</option>
                               </select>
                           </div>
                       </div>
                       <!--End of ROW 5-->
                       
                       <!--ROW 6-->
                       <div class="row">
                          <div class="col-sm-3 col-md-3 col-lg-3"><h4>Owner </h4></div>
                           <div class="col-sm-3 col-md-3 col-lg-3">
                               <input name="title" id="title" class="input-sm" autocomplete="off">
                               <div id="display"></div>
                           </div>
                          
                          
                          
                       </div>
                                                                     
                       
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
                               <button name="clear" id="clear" type="reset"
                                       class="btn btn-primary">
                                   <i class="glyphicon glyphicon-remove"></i> Clear
                               </button>
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