<?php
if(!isset($_SESSION)){
    session_start();
 }
 date_default_timezone_set("Asia/Colombo"); //Changing time zone
 $userinfo=$_SESSION['userinfo'];
 $role_id=$userinfo['role_id'];
 
 $po_id=$_GET['po_id'];
 
?>
<html>
    <head> 
        <title>OnLine Sale Management System</title>
        <link rel="icon" href="../../../images/bi.png" />
        <link rel="stylesheet" type="text/css" 
              href="../../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" 
          href="../../../css/mainlayout.css" />
       <link href="../../../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
     
    </script>
   
  
<script type="text/javascript">
    //Ajax for role Rights
function showSize(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("show").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("show").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchSize.php?q="+str,true);
xmlhttp.send();
}


//To check Integers and Dot
function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode !=43)) {
					// 31 is Unit Separator, 48 is Zero, 57 is Nine, 88 is Uppercase X
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        } 
</script>
    <script type="text/javascript" src="../../../js/ajaxscript.js">
        </script>
<script type="text/javascript" src="../../../js/uservalidate.js">
</script>
     <script type="text/javascript" src="../../../js/jquery.autocomplete.pack.js"></script>
<script type="text/javascript" src="../../../js/script.js"></script>
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
                                <li>
     <a href="../../login/view/dashboard.php">               
         Dashboard </a></li> 
         <li><a href="../../order/view/order.php">Order Management</a></li>
         <li class="active">Add Purchase Order </li>
                    </ol> 
    <h3 align="center">Add <small>Purchase Order</small></h3>
                    
                </div>
                <HR />
                
                <div>
                    
                    <div class="row">
    <div class="col-lg-12" style="text-align: center">
        <?php
        if(isset($_GET['m'])){
            $msg=  base64_decode($_GET['m']); //To decode
            $status=$_GET['status'];
            if($status==0){ 
                $s="alert-danger";
            }else{
                 $s="alert-success";
            }
           
            echo "<span id='msg' class=".$s.">".$msg."</span>";
        }else{
            
            echo '<span class="alert-danger" id="msg"></span>';
            
        }
        
        
        ?>
        

    </div>
                    </div>
                    
                   <!--start -->
                   <form name="addstock" method="post" 
                         action="../controller/stockcontroller.php?action=add" 
                         enctype="multipart/form-data">
                       <div class="row">
                           <div class="col-lg-12 col-sm-12 col-md-12">
                               <p align="center">
                            
                               </p>
                           </div>
                           
                           
                       </div>
                       
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Product Name 
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="p_name" id="p_name1" 
                                  placeholder="Product Name" class="form-control" required 
                                   /> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Quantity
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <div id="show">
                           <input name="quantity" id="quantity" 
                                  placeholder="Quantity" class="form-control" required onkeypress="return onlyNos(event,this)"/>
                           </div>
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>
                  
                 
                  
           
                  <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                     
     
                                  
                 
                 
                
                 
                
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           &nbsp;
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <button type="submit" 
                                   class="btn btn-primary">
                               <i class="glyphicon glyphicon-save"> </i>  
                                  Save</button>
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           &nbsp;
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <button type="reset" 
                                   class="btn btn-primary">
                               <i class="glyphicon glyphicon-refresh"> </i>  
                                  Reset</button> 
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>      
                       
                   </form>       
                   <!-- End -->
                 
                    
                    
                </div>
                
            </div>      
            <div id="footer">
                
               <?php include '../../../common/footer.php'; ?> 
            </div>            
        </div>
        
    </body>
    
</html>
