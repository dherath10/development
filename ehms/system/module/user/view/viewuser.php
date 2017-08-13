<?php
if(!isset($_SESSION)){
    session_start();    
}
//To set Default Time Zone
date_default_timezone_set("Asia/Colombo");

//session handling - to check whether login or not
include '../../../common/session_handling.php';

$userinfo=$_SESSION['userinfo']; //To get from session
$username=$userinfo['username'];
$user_id=$userinfo['user_id'];
$role_id=$userinfo['role_id'];
$role_name=$userinfo['role_name'];
$user_image=$userinfo['user_image'];

include '../../../common/query.php'; //To call common queries
$obj=new query(); //To create an object using query class
$result=$obj->disRole();//To call a function called disRole from query

$d=date('Y-m-d'); //Current Date

$user_id=$_GET['user_id'];
$resultuser=$obj->viewUser($user_id);
$rowuser=$resultuser->fetch_assoc();
//print_r($rowuser);
$resultjob=$obj->viewJob($user_id);

?>

        
<h4 style="text-align: center">View User</h4>
<hr />
                    <div class="container-fluid">
                        <!-- Start 1 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>First Name :  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>  <?php echo $rowuser['fname']; ?> </h4>                        
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Last Name :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                 <h4>  <?php echo $rowuser['lname']; ?> </h4>                       
                                
                            </div>                                         
                        </div> 
                        <!-- End 1 row -->
                        <div style="clear: both">&nbsp;</div>
                        <!-- Start 2 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Email :  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>  <?php echo $rowuser['email']; ?> </h4>                         
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>User Name :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                               <h4>  <?php echo $rowuser['username']; ?> </h4> 
                            </div>                                         
                        </div> 
                        <!-- End 2 row -->
                        <div style="clear: both">&nbsp;</div>
                        <!-- Start 3 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>DOB:  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>  <?php echo $rowuser['dob']; ?> </h4>                        
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>NIC :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                 <h4>  <?php echo $rowuser['nic']; ?> </h4>                        
                                
                            </div>                                         
                        </div> 
                        <!-- End 3 row -->
                        <div style="clear: both">&nbsp;</div>
                        <!-- Start 4 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Tel No:  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                             <h4>  <?php echo $rowuser['tel']; ?> </h4> 
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Gender :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>  <?php echo $rowuser['gender']; ?> </h4> 
                                
                            </div>                                         
                        </div> 
                        <!-- End 4 row -->
                          <div style="clear: both">&nbsp;</div>
                        <!-- Start 5 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Address </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                 <h4>  <?php echo $rowuser['address']; ?> </h4>                       
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Image :</h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>  
                                 <?php if($rowuser['user_image']==""){ ?>
              <img src="../../../images/user.png" width="50" height="auto" />        
                            <?php } else{ ?>
        <img src="../../../images/user_images/<?php echo $rowuser['user_image'];?>"
                width="50" height="auto" />        
                            <?php } ?> 
                                
                                
                                </h4> 
                            </div>                                         
                        </div> 
                        <!-- End 5 row -->
                        
                          <div style="clear: both">&nbsp;</div>
                        <!-- Start 6 row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h4>Role :  </h4>                              
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                 <h4>  <?php echo $rowuser['role_name']; ?> </h4>            
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                &nbsp;                           
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                &nbsp;
                                
                            </div>                                         
                        </div> 
                        <!-- End 6 row -->
                        <div style="clear: both">&nbsp;</div>
                        <!-- Start 7 row -->
                        
                        <!-- End 7 row -->                    
                        
                        <hr />
                        <div class="row">
                            
                            <div class="col-sm-3">Title</div>
                            <div class="col-sm-3">Field</div>
                            <div class="col-sm-3">Organization</div>
                            <div class="col-sm-3">Years</div>
                        </div>
                        <hr />
                        <?php while($rowjob=$resultjob->fetch_assoc()){ 
                            $from=$rowjob['jfrom'];
                            $to=$rowjob['jto'];
                            $date1=new DateTime($from);
                            $date2=new DateTime($to);
                            $diff = $date1->diff($date2);
                            $y=$diff->y;
                            $m=$diff->m;
                            $d=$diff->d;
                            
                            $ymd="Years :".$y." Months :".$m." Days ".$d;
                            
                            ?>
                         <div class="row">
                            
                            <div class="col-sm-3">
                                <?php echo $rowjob['jtitle']; ?></div>
                             <div class="col-sm-3">
                                 <?php echo $rowjob['jfield']; ?>
                             </div>
                            <div class="col-sm-3">
                                <?php echo $rowjob['oname']; ?></div>
                             <div class="col-sm-3">
                                 <?php echo $ymd; ?>
                                 
                             </div>
                        </div>
                        <?php } ?>
                        
                        
                        
                        
                        
                    </div>

<?php
$date1 = new DateTime("2008-01-02");
$date2 = new DateTime("2012-07-05");
$diff = $date1->diff($date2);

echo "difference " . $diff->y . " years, " . $diff->m." months, ".$diff->d." days ";
?>