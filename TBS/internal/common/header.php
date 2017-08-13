<?php
//include '../../../common/display.php';
//$obj = new display();
//$result=$objd->unseenNotification();
 $con1=new mysqli("localhost","root","","tbs"); 
 $sqln="SELECT * FROM reservation WHERE res_not='Unseen' ORDER BY res_id DESC";
 $resultn=$con->query($sqln);
 
 $sqlnn="SELECT * FROM reservation WHERE res_not='Unseen' ORDER BY res_id DESC LIMIT 0,5";
 $resultnn=$con->query($sqlnn);
 

$norn=$resultn->num_rows;

?>
<div id="headerleft"> Taxi Booking System</div>
               <div id="headerright">
                    <i class="glyphicon glyphicon-cog"></i>
       <?php echo $row['user_fname']." ".$row['user_lname']; ?>
                    (<?php echo $row['role_name']; ?>)
                    <a href="../../login/view/logout.php" class="a1">Logout</a>
              

<!--Notification start-->
                    
        <script type="text/javascript">
$(document).ready(function() {
    $('.notification-trigger').click(function() {
        $('.panel').toggleClass('visible');
    });
})
        </script>
        
            <span class="header">
            <a href="#" class="notification-trigger">
                <i class="glyphicon glyphicon-bell"></i>
                <span class='notification-num'><?php echo $norn; ?></span>
            </a>
            </span>  
        <!--Notification End-->
            
        </div>
                    
        <div class="panel">
            <div class="title">Notifications</div>
            <ul class="notification-bar">
                <?php while($rown=$resultnn->fetch_assoc()){ ?>        
                <li class="unread">
 <a href="../../booking/view/bookingview.php?res_id=<?php echo $rown['res_id']; ?>">
                    <i class="glyphicon glyphicon-info-sign"></i>
                    <div>Reservation ID <?PHP echo $rown['res_id']." Date :".$rown['date']." ".$rown['time']; ?></div>
 </a>              
 </li>
                <?php } ?>
                <li><a href="../../booking/view/booking.php">View All</a></li>
            </ul>
            
            
        </div>
</div>
</div>                    
           



