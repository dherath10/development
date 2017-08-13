<?php
include '../../../common/display.php';
if ($_POST['rowid']) {
    $id = $_POST['rowid']; //escape string
    $ob = new display();
    $result = $ob->displayBooking($id);
    $rowbooking = $result->fetch_assoc();
    // Run the Query
    // Fetch Records
    // Echo the data you want to show in modal
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">
        <?php echo $rowbooking['cus_fname']; ?>'s hire details
    </h4>
</div>
<!--row1-start-->

    
<br/>
<div class="col-sm-1"></div>
<div class="row">
    <div class="col-sm-3">Title:&nbsp&nbsp;<?php echo $rowbooking['cus_title']; ?></div>
    
    <div class="col-sm-3 col-md-3 col-lg-3">First Name:&nbsp&nbsp;<?php echo $rowbooking ['cus_fname']; ?></div>

    <div class="col-sm-3 col-md-3 col-lg-3">Last Name:&nbsp&nbsp;<?php echo $rowbooking['cus_lname']; ?></div>
</div>
<hr/>
<!--row1-end-->

<!--row2-start-->
<div class="col-sm-1"></div>
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">Email:&nbsp&nbsp;<?php echo $rowbooking['cus_email'];?></div>


    <div class="col-sm-3 col-md-3 col-lg-3">Telephone:&nbsp&nbsp;<?php echo $rowbooking['cus_telno']; ?></div>

</div>
<hr/>
<!--row2-end-->

<!--row3-start-->
<div class="col-sm-1"></div>
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">From:&nbsp&nbsp;<?php echo $rowbooking['res_from']; ?></div>


    <div class="col-sm-3 col-md-3 col-lg-3">To:&nbsp&nbsp;<?php echo $rowbooking['res_to']; ?></div>

</div>
<hr/>
<!--row3-end-->

<!--row4-start-->
<div class="col-sm-1"></div>
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">Date:&nbsp&nbsp;<?php echo $rowbooking['date']; ?></div>


    <div class="col-sm-3 col-md-3 col-lg-3">Time:&nbsp&nbsp;<?php echo $rowbooking['time']; ?></div>
    

</div>
<hr/>
<!--row4-end-->

<!--row5-start-->
<div class="col-sm-1"></div>
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">Class:&nbsp&nbsp;<?php echo $rowbooking['class']; ?></div>


    <div class="col-sm-3 col-md-3 col-lg-3">A/C Type:&nbsp&nbsp;<?php echo $rowbooking['ac_type']; ?></div>

    


    <div class="fetched-data"></div> 
</div>

<!--row5-end-->

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

