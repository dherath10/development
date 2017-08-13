<?php
if(!isset($_SESSION)){
    session_start();
 }
 //ERROR REPORTING
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 
    //To store logged user's information
 $userinfo=$_SESSION['userinfo'];
 $role_id=$userinfo['role_id'];
 $u_id=$userinfo['user_id']; 
 
$page=$_GET['page'];
if($page=="" || $page==1){
    
    $page1=0;
}else{
    $page1=($page*5)-5;
    
}

include '../../product/model/productmodel.php';
$obj=new product();
$result=$obj->viewAllProduct();

?>
<html>
    <head> 
        <title>OnLine Sale Management System</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" 
          href="../../../css/mainlayout.css" />
    <link type="text/css" rel="stylesheet" href="../../../css/datatable.css" />
     
    <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
     
    </script>
   
    <script type="text/javascript">
        function confirmMsg(action){
            var r=confirm("Do You want to "+action+ " ?");
            if(r){
                return true;
            }else{
                return false;
            }
                
        }
        //Focus on search element when the user page is being loading
        function focusSearch(){
            document.getElementById('search').focus();
            
        }
        
        
    </script>
    <script type="text/javascript" src="../../../js/ajaxscript.js">     
        </script>
        <script type="text/javascript" src="../../../js/datatable.js">     
        </script>
        <script type="text/javascript" src="../../../js/jquery.bdt.js">     
        </script>
        <script>  
            $(document).ready( function () {  
             $('#usermanagement').bdt();  
         });  
        </script> 
        
    </head>
    <body onload="focusSearch()">
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
                                <li>
     <a href="../../login/view/dashboard.php">               
         Dashboard </a></li> 
         <li class="active">
             <a href="../view/stock.php">
             Stock Management
             </a></li>
                    </ol> 
    <h3 align="center">Stock <small>Management</small></h3>
                    
                </div>
                <div class="row" style="padding-left: 20px">
                        <div class="col-lg-6 col-sm-6 col-md-6">  
                            <?php if($userinfo['role_id']==2 || $userinfo['role_id']==3 || $userinfo['role_id']==5){
                                //To restrict - only for admin
                                ?>
                            <a href="../../stock/view/addstock.php">
                                <button class="btn btn-primary" 
                                        type="button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    Add                                    
                                </button>               
                               </a> 
                            <?php } ?>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            &nbsp;
                        </div>
                    </div>
                
                
                <HR />
                <div class="container-fluid" style="padding-left: 100px;padding-right: 100px">
                    <table class="table table-responsive">
                    <th width="10%">&nbsp;</th>
                        <th width="5%">ID</th>
                        <th width="15%">Product Name</th>
                        <th width="10%">Type</th>
                        <th width="10%">Category</th>
                        <th width="10%">Color</th>
                        <th width="10%">Price</th>
                        <th width="10%">Size</th>
                        <th width="20%">&nbsp;</th>
                    </table>
                    <table class="table table-responsive"
                           id="usermanagement">
                     
                    <?php while($row=$result->fetch_assoc()){ ?>
                    <tr>
                            <td width="10%"><img src="../../../images/product_images/<?php echo $row['p_image'] ?>"
                                height="35" width="auto" /> </td>
                            <td width="5%"><?php echo $row['p_id']; ?></td>
                            <td width="15%"><?php echo $row['p_name']; ?></td>
                            <td width="10%"><?php echo $row['p_type']; ?></td>
                            <td width="10%"><?php echo $row['cat_name']; ?></td>
                            <td width="10%"><?php echo $row['color_name']; ?></td>
                            <td width="10%"><?php echo $row['p_price']; ?></td>
                            <td width="10%"><?php 
                            $results=$obj->getSizes($row['p_id']);
                            while($rows=$results->fetch_assoc()){
                            echo $rows['size_code'].", "; 
                            } 
                            ?></td>
                            <td width="20%">
                                <a href="../view/viewproduct.php?p_id=<?php echo $row['p_id'] ?>&action=view">
    <button class="btn btn-success btn-sm">View</button>
</a>
                           
                           &nbsp;
                           
    <a href="../view/editproduct.php?p_id=<?php echo $row['p_id'] ?>&action=edit">
    <button class="btn btn-success btn-sm">Edit</button>
</a>
           &nbsp;
           <a href="../controller/productcontroller.php?p_id=<?php echo $row['p_id'] ?>&action=delete">
               <button class="btn btn-danger btn-sm" onclick="return confirmMsg(' delete')">Delete</button>
</a>
                                
                            </td>
                    </tr>
                    <?php } ?> 
                                     
                </table>   
            </div> 
            
            <div id="footer">
                
               <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
        
    </body>
    
</html>
