<?php 

?>
<!--Start-->
                   <div class="ali">
                       <?php if($row['user_image']==""){ ?>
                       <img src="../../../images/donor.png" width="30" auto="">
                      <?php }else{
                          
                          echo '<img src="../../../images/user_image/'.$row['user_image'].'" width="30" height="auto">';
                      } ?>
                       <br/>
                       <?php echo $row['user_fname']." ".$row['user_lname']; ?>
                       <br/>
                       <?php
                       echo $_SESSION['logInfo'];
                       ?>
                   </div> 
                   <hr/>
                   <div>
                    <!-- Start MD-->
                       <?php if($row['role_id']==1){ ?>
                       <ul class="list1">
                           <li>
                               <a href="../../user/view/user.php" class="a1">
                                   <i class="glyphicon glyphicon-user"></i> User Management
                               </a>
                           </li>

                           <li>
                               <a href="../../booking/view/booking.php" class="a1">
                                   <i class="glyphicon glyphicon-book"></i> Booking Management
                               </a>
                           </li>

                           <li>
                               <a href="../../vehicle/view/vehicle.php" class="a1">
                                   <i class="glyphicon glyphicon-certificate"></i> Vehicle Management
                               </a>
                           </li>

                           <li>
                               <a href="../../driver/view/driver.php" class="a1">
                                   <i class="glyphicon glyphicon-cog"></i> Driver Management
                               </a>
                           </li>

                           <li>
                               <a href="../../transport/view/transport.php" class="a1">
                                   <i class="glyphicon glyphicon-tasks"></i> Transport Management
                               </a>
                           </li>

                           <li>
                               <a href="../../notification/view/notification.php" class="a1">
                                   <i class="glyphicon glyphicon-new-window"></i> Notification Management
                               </a>
                           </li>

                           <li>
                               <a href="../../report/view/report.php" class="a1">
                                   <i class="glyphicon glyphicon-record"></i> Report Management
                               </a>
                           </li>

                           <li>
                               <a href="../../feedback/view/feedback.php" class="a1">
                                   <i class="glyphicon glyphicon-map-marker"></i> Feedback Management
                               </a>
                           </li>
                       </ul>
                           
                       <?php } ?>
                            <!-- End of MD-->

                            <!-- Start System-->
                       <?php if($row['role_id']==2){ ?>
                       <ul class="list1">
                           <li>
                               <a href="../../user/view/user.php" class="a1">
                                   <i class="glyphicon glyphicon-user"></i> User Management
                               </a>
                           </li>
                           
                           <li>
                               <a href="../../vehicle/view/vehicle.php" class="a1">
                                   <i class="glyphicon glyphicon-certificate"></i> Vehicle Management
                               </a>
                           </li>

                           <li>
                               <a href="../../driver/view/driver.php" class="a1">
                                   <i class="glyphicon glyphicon-cog"></i> Driver Management
                               </a>
                           </li>

                           <li>
                               <a href="../../transport/view/transport.php" class="a1">
                                   <i class="glyphicon glyphicon-tasks"></i> Transport Management
                               </a>
                           </li>

                           <li>
                               <a href="../../notification/view/notification.php" class="a1">
                                   <i class="glyphicon glyphicon-new-window"></i> Notification Management
                               </a>
                           </li>

                           <li>
                               <a href="../../report/view/report.php" class="a1">
                                   <i class="glyphicon glyphicon-record"></i> Report Management
                               </a>
                           </li>

                           <li>
                               <a href="../../backup/view/backup.php" class="a1">
                                   <i class="glyphicon glyphicon-map-marker"></i> Backup Management
                               </a>
                           </li>
                           
                           <li>
                               <a href="../../track/view/viewtrack.php" class="a1">
                                   <i class="glyphicon glyphicon-bullhorn"></i> User Tracking
                               </a>
                           </li>
                       </ul>

                       <?php } ?>
                            <!-- End of System Admin-->

                            <!-- Start Manager-->
                       <?php if($row['role_id']==3){ ?>
                       <ul class="list1">
                           <li>
                               <a href="../../booking/view/booking.php" class="a1">
                                   <i class="glyphicon glyphicon-book"></i> Booking Management
                               </a>
                           </li>

                           <li>
                               <a href="../../vehicle/view/vehicle.php" class="a1">
                                   <i class="glyphicon glyphicon-certificate"></i> Vehicle Management
                               </a>
                           </li>

                           <li>
                               <a href="../../driver/view/driver.php" class="a1">
                                   <i class="glyphicon glyphicon-cog"></i> Driver Management
                               </a>
                           </li>

                           <li>
                               <a href="../../transport/view/transport.php" class="a1">
                                   <i class="glyphicon glyphicon-tasks"></i> Transport Management
                               </a>
                           </li>

                           <li>
                               <a href="../../notification/view/notification.php" class="a1">
                                   <i class="glyphicon glyphicon-new-window"></i> Notification Management
                               </a>
                           </li>

                           <li>
                               <a href="../../report/view/report.php" class="a1">
                                   <i class="glyphicon glyphicon-record"></i> Report Management
                               </a>
                           </li>

                           
                       </ul>

                       <?php } ?>
                            <!-- End of Manager-->

                            <!-- Start Accountant-->
                       <?php if($row['role_id']==4){ ?>
                       <ul class="list1">
                           <li>
                               <a href="../../booking/view/booking.php" class="a1">
                                   <i class="glyphicon glyphicon-book"></i> Booking Management
                               </a>
                           </li>

                           <li>
                               <a href="../../payment/view/payment.php" class="a1">
                                   <i class="glyphicon glyphicon-credit-card"></i> Payment Management
                               </a>
                           </li>

                           <li>
                               <a href="../../notification/view/notification.php" class="a1">
                                   <i class="glyphicon glyphicon-new-window"></i> Notification Management
                               </a>
                           </li>

                           <li>
                               <a href="../../report/view/report.php" class="a1">
                                   <i class="glyphicon glyphicon-record"></i> Report Management
                               </a>
                           </li>

                       </ul>

                       <?php } ?>
                            <!-- End of Accountant-->
                   </div>
                   <!--End of sidebar-->