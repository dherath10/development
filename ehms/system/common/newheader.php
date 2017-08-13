<?php
$con1 = new mysqli("localhost", "root", "", "ehms");
$sql1="SELECT * FROM inquiry WHERE in_status='Unseen'";
$result1=$con1->query($sql1);
$nor1=$result1->num_rows;
?>
<script type="text/javascript">
        $(document).ready(function () {
            $('.notification-trigger').click(function () {
                $('.panel').toggleClass('visible');
            });
        })
    </script>


<div id="leftheader">
    <img height="50" width="auto" 
        src="../../../images/Sustainability-SupportingOurCustomers_Icon.png" />
     Elder's Home Management System</div>
                <div id="rightheader">
                    <i class="glyphicon glyphicon-cog"></i>
     <?php echo $username." (".$role_name.")"; ?>
                    
                    <span class="header">
        <a href="#" class="notification-trigger">
            <i class="glyphicon glyphicon-bell"></i>
            <span class='notification-num'><?php echo $nor1; ?></span>
        </a>
    </span> 
                    
                    
                    <a href="../../login/view/logout.php" class="a1">LogOut</a>
                    
                </div>
    
    
    <div class="panel">
            <div class="title">Notifications</div>
    <ul class="notification-bar">
        
        <?php while ($rownn = $result1->fetch_assoc()) { ?>

            <li class="unread">

                <a href="../../inquiry/view/inquiryview.php?in_id=<?php echo $rownn['in_id']; ?>">
                <i class="glyphicon glyphicon-info-sign"></i>
                <div>Inquiry ID <?php echo $rownn['in_id'] . " Date :" . $rownn['in_date'] . " " . $rownn['in_cat']; ?> </div>
                </a>

            </li>
        <?php } ?>
        
        
       
        <!--                <li>
                            <i class="ion-paper-airplane"></i>
                            <div>Second notification</div>
                        </li>
                        <li>
                            <i class="ion-plus"></i>
                            <div>First notification</div>
                        </li>-->
        <li>
            <a href="../../../booking/booking.php">View All</a>
        </li>
    </ul>
    
</div>

