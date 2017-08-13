<?php
if(!isset($_SESSION)){
    session_start();
 }
 $userinfo=$_SESSION['userinfo'];
 $user_id=$userinfo['user_id'];
 
$action=$_GET['action'];
include '../../stock/model/stockmodel.php';
$ob=new stock();
if($action=="add"){
    $p_name=$_POST['p_name'];
    $p_size=$_POST['size_id'];
    $sup_name=$_POST['sup_name'];
    $quantity=$_POST['quantity'];
    $stock_price=$_POST['stock_price'];
    
     
    $p_id=$ob->getID($p_name,"product","p_name");
    
     $sup_id=$ob->getID($sup_name,"supplier","sup_name");
 
  $r=$ob->addStock($quantity,$p_id,$p_size,$sup_id,$user_id,$stock_price);
   
  if($r){
      $msg="A stock has been added";
       $rb=$ob->addStockBalance($quantity,$p_id,$p_size);
  }else{
      $msg="A stock has not been added";
  }
  header("Location:../view/stock.php?msg=$msg"); 
    
    
}

if($action=="delete"){
    $p_id=$_GET['p_id'];
    
    $result=$ob->deleteProduct($p_id); 
    if($result){
        $msg="Product ID : ".$p_id." has been deactivated";
        $status=1;
    }else{
        $msg="Product ID : ".$p_id." has not been deactivated";
        $status=0;
    }
    $m=base64_encode($msg);
    header("Location:../view/product.php?m=$m&status=$status&page=$page");
}
