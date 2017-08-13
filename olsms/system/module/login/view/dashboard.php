<?php
if(!isset($_SESSION)){
    session_start();
 }
 
 $userinfo=$_SESSION['userinfo'];
 $role_id=$userinfo['role_id'];



?>
<html>
    <head> 
        <title>OnLine Sale Management System</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" 
          href="../../../css/mainlayout.css" />
     
    <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
     
    </script>
   
    </script>
    </head>
    <body>
        <div id="main">
            <div id="header">
               <?php include '../../../common/header.php'; ?>      
              
            </div>
            <div id="navi">
                <?php include '../../../common/navi.php'; ?>
                
                &nbsp;</div>
            <div id="contents">
                <div>
                    <ol class="breadcrumb">
                        <li class="active">Dashboard</li>                        
                    </ol> 
    <h3 align="center"><?php echo $userinfo['role_name']; ?> <small>Dashboard</small></h3>
                    
                </div>
                <HR /><br />
                <!-- Start User Rights -->
                <div>
                    <?php 
                    //Start Admin
                    if($role_id==1) { ?>
                    <div class="row">
                        
                   <div class="col-lg-3 col-md-3 col-sm-3">&nbsp;</div>
        <div class="col-lg-2 col-md-2 col-sm-2"> 
            <p class="ali">
                <a href="../../user/view/user.php">
                       <img src="../../../images/user.png" 
                            width="75" height="75" />
                       <br />
                       User Management
                </a>
            </p>   
                       &nbsp;</div>
                   <div class="col-lg-2 col-md-2 col-sm-2">
                     
                   <p class="ali">
                <a href="../../track/view/track.php">
                    <img src="../../../images/download (1).png" 
                            width="75" height="75" />
                       <br />
                      Login Tracking
                </a>
            </p>   
             </div>
                   <div class="col-lg-2 col-md-2 col-sm-2">
                       <p class="ali">
                <a href="../../report/view/repot.php">
                    <img src="../../../images/report.png" 
                            width="75" height="75" />
                       <br />
                       Reports
                </a>
            </p>
                       &nbsp;</div>                  
                   <div class="col-lg-3 col-md-3 col-sm-3">&nbsp;</div>
                    </div>
                    
                    <div class="row">
                        
                   <div class="col-lg-3 col-md-3 col-sm-3">&nbsp;</div>
        <div class="col-lg-2 col-md-2 col-sm-2"> 
            
                       &nbsp;</div>
                   <div class="col-lg-2 col-md-2 col-sm-2">
                     
                   <p class="ali">
                <a href="../../backup/view/backup.php">
                    <img src="../../../images/supmeeting.png" 
                            width="75" height="75" />
                       <br />
                     BackUp
                </a>
            </p>   
             </div>
                   <div class="col-lg-2 col-md-2 col-sm-2">
                      
                       &nbsp;</div>                  
                   <div class="col-lg-3 col-md-3 col-sm-3">&nbsp;</div>
                    </div>
                                    
                    <!-- Begin Fresh Tilled Soil Video Chat Embed Code -->
<div id="freshtilledsoil_embed_widget" class="video-chat-widget"></div>
<script id="fts" src="http://freshtilledsoil.com/embed/webrtc-v5.js?r=FTS0316-CZ6NqG97"></script>
<!-- End Fresh Tilled Soil Video Chat Embed Code -->
                    
                    <?php 
                    
                    } 
                    //end admin
                    //Start Manager
                    if($role_id==4){ 
                    ?>
                    
                    <div class="row">
               <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../product/view/product.php">
                    <img src="../../../images/order2.jpg" 
                            width="75" height="75" />
                       <br />
                       Product Management
                </a>
            </p>    
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../customer/view/customer.php">
                    <img src="../../../images/supmeeting.png" 
                            width="75" height="75" />
                       <br />
                       Customer Management
                </a>
            </p>  
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../order/view/order.php">
                    <img src="../../../images/orede1.png" 
                            width="75" height="75" />
                       <br />
                       Order Management
                </a>
            </p>  
                   
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../payment/view/payment.php">
                    <img src="../../../images/onlinepay.png" 
                            width="75" height="75" />
                       <br />
                       Payment Management
                </a>
            </p>                  
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>        
                    </div>
                    
                    <div style="clear:both">&nbsp;</div>
                    
                    
                    <div class="row">
               <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../supplier/view/supplier.php">
                    <img src="../../../images/suporder.png" 
                            width="75" height="75" />
                       <br />
                       Supplier Management
                </a>
            </p>    
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../stock/view/stock.php">
                    <img src="../../../images/STORE1.jpg" 
                            width="75" height="75" />
                       <br />
                       Stock Management
                </a>
            </p>  
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../report/view/report.php">
                    <img src="../../../images/report.png" 
                            width="75" height="75" />
                       <br />
                       Report
                </a>
            </p>  
                   
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../feedback/view/feedback.php">
                    <img src="../../../images/order.jpg" 
                            width="75" height="75" />
                       <br />
                       Feedback Management
                </a>
            </p>                  
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>        
                    </div>
                   
                    <div style="clear:both">&nbsp;</div>
                    
                    <div class="row">
               <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
          <div class="col-lg-2 col-md-2 col-sm-2">         
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../delivery/view/delivery.php">
                    <img src="../../../images/sup3.png" 
                            width="75" height="75" />
                       <br />
                       Delivery Management
                </a>
            </p>  
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                   <p class="ali">
                <a href="../../login/view/track.php">
                    <img src="../../../images/download (1).png" 
                            width="75" height="75" />
                       <br />
                       Login Tracking
                </a>
            </p>  
                   
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">              
                   
                   &nbsp;</div>
               <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>        
                    </div>
                    
                    <!-- Begin Fresh Tilled Soil Video Chat Embed Code -->
<div id="freshtilledsoil_embed_widget" class="video-chat-widget"></div>
<script id="fts" src="http://freshtilledsoil.com/embed/webrtc-v5.js?r=FTS0316-CZ6NqG97"></script>
<!-- End Fresh Tilled Soil Video Chat Embed Code -->
                    
                    
                    
                    
                    
                    <?php } 
                    //End ManAger
                    //Start Stock Officer
                    if($role_id==2) {
                    ?>
           <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-3">&nbsp;</div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../product/view/product.php">
              <img src="../../../images/order2.jpg" width="75"
                   height="" /><br />
               Product Management
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../order/view/order.php">
                   <img src="../../../images/orede1.png" width="75"
                   height="" /><br />
               Order Management
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../payment/view/payment.php">
                   <img src="../../../images/onlinepay.png" width="75"
                   height="" /><br />
               Payment Management
               </a>
               </p>
           </div>             
           </div>
                    <div style="clear: both">&nbsp;</div>       
           <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-3">&nbsp;</div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../stock/view/stock.php">
                   <img src="../../../images/STORE1.jpg" width="75"
                   height="" /><br />
               Stock Management
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../report/view/report.php">
                   <img src="../../../images/report.png" width="75"
                   height="" /><br />
               Report
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../delivery/view/delivery.php">
                   <img src="../../../images/del.jpg" width="75"
                   height="" /><br />
               Delivery Management
               </a>
               </p>
           </div>             
           </div>
                    <!-- Begin Fresh Tilled Soil Video Chat Embed Code -->
<div id="freshtilledsoil_embed_widget" class="video-chat-widget"></div>
<script id="fts" src="http://freshtilledsoil.com/embed/webrtc-v5.js?r=FTS0316-CZ6NqG97"></script>
<!-- End Fresh Tilled Soil Video Chat Embed Code -->
                    <?php }
                    
                    //sale ref
                    
                    if($role_id==5) { ?>
                    
                    
                     <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-3">&nbsp;</div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../product/view/product.php">
              <img src="../../../images/order2.jpg" width="75"
                   height="" /><br />
               Product Management
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../order/view/order.php">
                   <img src="../../../images/orede1.png" width="75"
                   height="" /><br />
               Order Management
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../customer/view/customer.php">
                   <img src="../../../images/supmeeting.png" width="75"
                   height="" /><br />
               Customer Management
               </a>
               </p>
           </div>             
           </div>
                    <div style="clear: both">&nbsp;</div>       
           <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-3">&nbsp;</div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../supplier/view/supplier.php">
                   <img src="../../../images/sup.png" width="75"
                   height="" /><br />
               Supplier Management
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../report/view/report.php">
                   <img src="../../../images/report.png" width="75"
                   height="" /><br />
               Report
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../feedback/view/feedback.php">
                   <img src="../../../images/cart.png" width="75"
                   height="" /><br />
               Feedback Management
               </a>
               </p>
           </div>             
           </div>
                    
             <!-- Begin Fresh Tilled Soil Video Chat Embed Code -->
<div id="freshtilledsoil_embed_widget" class="video-chat-widget"></div>
<script id="fts" src="http://freshtilledsoil.com/embed/webrtc-v5.js?r=FTS0316-CZ6NqG97"></script>
<!-- End Fresh Tilled Soil Video Chat Embed Code -->       
                    
                    
                    
                    <?php }    
                    //Accountant 
                    
                    if($role_id==3) { ?>
                    
                     <div class="row">
           <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../customer/view/customer.php">
                   <img src="../../../images/supmeeting.png" width="75"
                   height="" /><br />
               Customer Management
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../order/view/order.php">
                   <img src="../../../images/orede1.png" width="75"
                   height="" /><br />
               Order Management
               </a>
               </p>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../payment/view/payment.php">
                   <img src="../../../images/onlinepay.png" width="75"
                   height="" /><br />
               Payment Management
               </a>
               </p>
           </div>     
            <div class="col-lg-2 col-md-2 col-sm-2">
               <p class="ali">
               <a href="../../report/view/report.php">
                   <img src="../../../images/report.png" width="75"
                   height="" /><br />
               Report
               </a>
               </p>
           </div>       
           <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
           </div>      
                    
                    
               <!-- Begin Fresh Tilled Soil Video Chat Embed Code -->
<div id="freshtilledsoil_embed_widget" class="video-chat-widget"></div>
<script id="fts" src="http://freshtilledsoil.com/embed/webrtc-v5.js?r=FTS0316-CZ6NqG97"></script>
<!-- End Fresh Tilled Soil Video Chat Embed Code -->     
                    
                    
                    <?php } ?>
                    
                    
                    
                    
                   
                    
                </div>
                <!-- End User Rights -->
                
            </div>      
            <div id="footer">
                
               <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
        
    </body>
    
</html>
