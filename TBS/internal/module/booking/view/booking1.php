<?php
//To include session part
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 include'../../../common/session.php';
 include'../../../common/session_handling.php';

 include "../model/booking_mod.php";
 $obj=new booking();
 $r=$obj->viewallbookings();
 
 $page=$_GET['page'];
 if($page=="" || $page==1){
     $page1=0;
 }  else {
     $page1=($page*5)-5;
     
}
 
 // to get all records in user table

 $nor=$r->num_rows;
// //echo $nor;
 $nopage=ceil($nor/5);
 
 //to limit records in user table
 $r1=$obj->viewbookinglimit($page1);
 ?>
<html>
    <head>
        <title> Taxi Booking System for Colombo Cabs </title>
        <!-- favicon changing icons in the title -->
        <link rel="icon" href="../../../images/yellow-taxi-10035627.jpg" />
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../../../css/layout.css" />

        <script type="text/javascript" src="../../../js/jquery.min.js"></script>
         <script type="text/javascript" src="../../../bootstrap/bootstrap/js/bootstrap.min.js"></script>
         
         <script>
         
         function  disMsg(m){
             var r=confirm("Do you want to "+m+" User ? :)");
             if(r){
                 return true;
             }else{
                 return false;
             }
         }
               $(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'fetch_recordb.php', //Here you will fetch records 
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
                <div id="newright" >
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="../../login/view/dashboard.php" >Dashboard</a></li>
                        <li class="active">Booking Management</li>
                    </ol>
                    <h2 style="padding-left:15px;">Booking <small>Management</small></h2>
                   
                    <div style="text-align: center" class="container-fluid col-lg-10">
                        <?php
                        if(isset($_GET['msg'])){
                            $msg= base64_decode($_GET['msg']);
                                    if($_GET['id']==1){
                                        $style="alert-success";
                                    }else{
                                        $style="alert-danger";
                                    }
                                    echo "<span class='".$style."'>".$msg."</span>";
                        }
                        ?>
                     <table class="table table-responsive table-hover">
                         <tr>
                             <th>&nbsp;</th>
                             <th>Customer Name</th>
                             <th>From</th>
                             <th>To</th>
                             <th>Date</th>
                             <th>Time</th>
                             <th>&nbsp;</th>
                         </tr>
                         <?php while($booking=$r1->fetch_assoc()){ ?>
                         <tr>
                             <td align="center"><?php
//                                 if ($user['user_image']==""){?>
<!--                                 <img src="../../../images/donor.png" width="30" height="auto" />-->
                                <?php // }  else {
//                                echo '<img src="../../../images/user_image/'.$user['user_image'].'"width="30" height="auto"';                              
//                                }?>
                             </td>
                             <td><?php echo $booking['cus_fname']." ".$booking['cus_lname'];?></td>
                             <td><?php echo $booking['res_from'];?></td>
                             <td><?php echo $booking['res_to'];?></td>
                             <td><?php echo $booking['date'];?></td>
                             <td><?php echo $booking['time'];?></td>
                              
                             <td>

                                    <?php 
//                                    if($row['role_id']==1 && $row['user_id']!=$user['user_id']){
//                                    if($user['user_status']=="Active"){?>
                            <!--<a href="../controller/usercontroller.php?action=Deactive&id=<?php // echo $user['user_id'];?>">-->
                                <!--<button type="button" class="btn btn-danger" onclick="return disMsg('Deactive');">Deactivate</button></a>-->
                                    <?php // }else { ?>
                                   <!--<a href="../controller/usercontroller.php?action=Active&id=<?php // echo $user['user_id'];?>">-->
                                       <!--<button type="button" class="btn btn-success" onclick="return disMsg('Active');">Activate</button></a>-->                      
                                    <?php // }
//                                    }
                                    ?>

                                <!--<a href="updateuser.php?action=update&id=<?php // echo $user['user_id'];?>&page=<?php // echo $page; ?>">-->
                                     <!--<button type="button" class="btn btn-warning">Update</button></a>-->

                               
                                     <button type="button" class="btn btn-warning" data-id="<?php echo $booking['res_id'];?>" data-toggle="modal" data-target="#myModal">View</button>
                                         
                                
                                     
                                     <a href="../controller/booking_controller.php?action=Delete&id=<?php echo $booking['res_id'];?>">
                                         <button type="button" class="btn btn-danger" onclick="return disMsg('delete')">Delete</button></a>
                               
                             </td>
                          </tr>
                         <?php   } ?>
                    <?php // } ?>
                    </table>  
                    </div>
                     
                    <nav class="container">
                        <ul class="pagination pagination-sm">
                            <?php for($i=1;$i<=$nopage;$i++) { ?>
                            <li>
                                <a href="booking.php?page=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                            <?php } ?>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content fetched-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in modal</p>
         <div class="fetched-data"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    </body>

</html>

