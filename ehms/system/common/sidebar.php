<!-- Side bar -->
                    <table width="100%" style="margin-top:10px">
                        <tr align="center">
                            <td>
                             <?php 
                             if($user_image==""){
                             ?>
                                <img src="../../../images/care.png" width="50"
                                     height="auto" style="border-radius: 30px"  />
                             <?php } else {?>
                                
       <img src="../../../images/user_images/<?php echo $user_image;?>"
                width="50" height="auto" style="border-radius: 30px"  /> 
                             <?php } ?>
                                &nbsp;</td>
                            
                        </tr>
                        <tr>
    <td style="text-align: center;color:#FFF"><?php echo $userinfo['role_name']; ?>&nbsp;</td>
                            
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            
                        </tr>
                        
                    </table>
                 <hr />   
            <ol class="list1">
                <?php 
                //Admin Role
                if($role_id==1){ ?>
                    <li><a href="../../user/view/user.php"> 
                            <i class="glyphicon glyphicon-user"></i>
                        User Management</a>
                      </li>
                      <br />
                <li><a href="../../report/view/report.php"> 
                            <i class="glyphicon glyphicon-record"></i>
                        Report Management</a>
                      </li>
                      <br />
                        <li><a href="../../backup/view/backup.php"> 
                            <i class="glyphicon glyphicon-barcode"></i>
                        Backup Management</a>
                      </li>
                      <br />
                      <li><a href="../../tracking/view/tracking.php"> 
                            <i class="glyphicon glyphicon-tag"></i>
                        Tracking Management</a>
                      </li>
                <?php }
                //Metron
                if($role_id==2) {
                ?>
                      
                      <li><a href="../../elder/view/elder.php"> 
                            <i class="glyphicon glyphicon-heart"></i>
                        Elder Management</a>
                      </li>
                    <br />
                      <li><a href="../../donor/view/donor.php"> 
                            <i class="glyphicon glyphicon-leaf"></i>
                        Donor Management</a>
                      </li>
                       <br />
                      <li><a href="../../schedule/view/schedule.php"> 
                            <i class="glyphicon glyphicon-calendar"></i>
                        Schedule Management</a>
                      </li>
                      <br />
                      <li><a href="../../donation/view/donation.php"> 
                            <i class="glyphicon glyphicon-link"></i>
                        Donation Management</a>
                      </li>  
                      <br />
                      <li><a href="../../expense/view/expense.php"> 
                            <i class="glyphicon glyphicon-usd"></i>
                        Expense Management</a>
                      </li>
                      <br />
                      <li><a href="../../inquiry/view/inquiry.php"> 
                            <i class="glyphicon glyphicon-inbox"></i>
                        Inquiry Management</a>
                      </li>
                      <br />
                       <li><a href="../../changerequest/view/changerequest.php"> 
                            <i class="glyphicon glyphicon-bell"></i>
                        Change Management</a>
                      </li>
                <?php } ?>
                    </ol>
                 <?php   
                 //Staff
                if($role_id==3) {
                ?>
                      
                      <li><a href="../../elder/view/elder.php"> 
                            <i class="glyphicon glyphicon-heart"></i>
                        Elder Management</a>
                      </li>
                    <br />
                      <li><a href="../../donor/view/donor.php"> 
                            <i class="glyphicon glyphicon-leaf"></i>
                        Donor Management</a>
                      </li>
                       <br />
                      <li><a href="../../schedule/view/schedule.php"> 
                            <i class="glyphicon glyphicon-calendar"></i>
                        Schedule Management</a>
                      </li>
                      <br />
                      <li><a href="../../donation/view/donation.php"> 
                            <i class="glyphicon glyphicon-link"></i>
                        Donation Management</a>
                      </li>
                      <br />
                      <li><a href="../../inquiry/view/inquiry.php"> 
                            <i class="glyphicon glyphicon-inbox"></i>
                        Inquiry Management</a>
                      </li>
                      <br />
                       <li><a href="../../report/view/report.php"> 
                            <i class="glyphicon glyphicon-bell"></i>
                        Report Management</a>
                      </li>
                <?php } ?>
                    </ol>
                    <?php
                    //Officer
                if($role_id==4) {
                ?>
                      
                      <li><a href="../../elder/view/elder.php"> 
                            <i class="glyphicon glyphicon-heart"></i>
                        Elder Management</a>
                      </li>
                    <br />
                      <li><a href="../../donor/view/donor.php"> 
                            <i class="glyphicon glyphicon-leaf"></i>
                        Donor Management</a>
                      </li>
                       <br />
                      <li><a href="../../schedule/view/schedule.php"> 
                            <i class="glyphicon glyphicon-calendar"></i>
                        Schedule Management</a>
                      </li>
                      <br />
                      <li><a href="../../donation/view/donation.php"> 
                            <i class="glyphicon glyphicon-link"></i>
                        Donation Management</a>
                      </li>  
                      <br />
                    
                      <li><a href="../../expense/view/expense.php"> 
                            <i class="glyphicon glyphicon-usd"></i>
                        Expense Management</a>
                      </li>
                      <br />
                      <li><a href="../../inquiry/view/inquiry.php"> 
                            <i class="glyphicon glyphicon-inbox"></i>
                        Inquiry Management</a>
                      </li>
                      <br />
                      <li><a href="../../changerequest/view/changerequest.php"> 
                            <i class="glyphicon glyphicon-bell"></i>
                        Change Management</a>
                      </li>
                      
                      <br />
                       <li><a href="../../report/view/report.php"> 
                            <i class="glyphicon glyphicon-bell"></i>
                        Report Management</a>
                      </li>
                <?php } ?>
                    </ol>
                 <?php  //Staff
                if($role_id==5) {
                ?>
                      
                      <li><a href="../../elder/view/elder.php"> 
                            <i class="glyphicon glyphicon-heart"></i>
                        Elder Management</a>
                      </li>
                    <br />
                      <li><a href="../../medical/view/medical.php"> 
                            <i class="glyphicon glyphicon-leaf"></i>
                        Medical Management</a>
                      </li>
                       <br />
                      <li><a href="../../report/view/report.php"> 
                            <i class="glyphicon glyphicon-calendar"></i>
                        Report Management</a>
                      </li>
                      
                <?php } ?>
                    </ol> 
                    <!-- End -->
