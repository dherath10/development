<?php
if(!isset($_SESSION)){
    session_start();
 }
 date_default_timezone_set("Asia/Colombo"); //Changing time zone
 $userinfo=$_SESSION['userinfo'];
 $role_id=$userinfo['role_id'];
 
 include '../model/productmodel.php';
 //To get all roles from role table
 $obj=new category();
 $resultc=$obj->viewCategory();
 //To get all modules from role table
 //$objm=new type();
 //$resultt=$objm->viewType();
 //To get rights based on Module
 $objs=new size();
$results=$objs->viewSize();

 $cdate=date("Y-m-d");
 $ctid=  strtotime($cdate); 
 $tid=60*60*24*365*18+60*60*24*4;
 $ptid=$ctid-$tid;
 $pdate=date('Y-m-d',$ptid);   
         
         
         
         
         
         
         
         
         
         
         
 
 
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
function showRights(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("showrights").innerHTML="";
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
    document.getElementById("showrights").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getRights.php?q="+str,true);
xmlhttp.send();
}
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
         <li><a href="../../product/view/product.php">Product Management</a></li>
         <li class="active">Add Product </li>
                    </ol> 
    <h3 align="center">Add <small>Product</small></h3>
                    
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
                   <form name="adduesr" method="post" 
                         action="../controller/productcontroller.php?action=add" 
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
                           <input name="p_name" id="p_name" 
                                  placeholder="Product Name" class="form-control" required="" /> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Type
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <select name="p_type" id="p_type" class="form-control" required>
                               <option value="">Select a Type</option>
                               <option value="Men">Men</option>
                               <option value="Women">Women</option>
                               <option value="Kids">Kids</option>
                                   
                               </option>
                     
                           </select> 
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>
                  <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Category
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <select name="cat_id" id="cat_id" required class="form-control">
                               <option value="">Select a Category</option>
                       <?php while($rowc=$resultc->fetch_assoc()){ ?>
                          <option value="<?php echo $rowc['cat_id']; ?>">
                                   <?php echo $rowc['cat_name']; ?>
                                   
                               </option>
                       <?php } ?> 
                           </select> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Color
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="p_color" id="p_color" 
                                  placeholder="Color" class="form-control" /> 
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>
                  <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                  
                  
                 
     
                   <div class="row">
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                         Price
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="p_price" id="p_price" 
                                  placeholder="Price" class="form-control" /> 
                       </div>
                       <div class="col-lg-2 col-sm-2 col-md-2">
                           Image
                       </div>
                       <div class="col-lg-3 col-sm-3 col-md-3">
                           <input name="p_image" id="p_image" type="file"
                                  placeholder="Image" class="form-control" /> 
                       </div>
                       <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                      
                   </div>                
                 <div class="col-lg-12 col-sm-12 col-md-12">&nbsp;</div>
                 
                 <div class="row">
                   <div class="col-lg-1 col-sm-1 col-md-1">&nbsp;</div>
                   <div class="col-lg-2 col-sm-2 col-md-2">
                       Sizes:
                       
                   </div>
                    <div class="col-lg-8 col-sm-8 col-md-8"> 
                     <?php while($rows=$results->fetch_assoc()){
                         ?>
                           
                           <?php
                         
                           $id=$rows['size_id'];
                        
                         
                           
  echo "<input type='checkbox' name='p_size[]' value='$id'  /> ".$rows['size_code']."&nbsp;&nbsp;";  
                                                                   
                     } ?>
                  
                       
                  &nbsp;</div>
                   
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
