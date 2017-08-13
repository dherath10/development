<?php
$action=$_GET['action'];
include '../../order/model/ordermodel.php';
$ob=new order();
if($action=="add"){
    $sup_name=$_POST['sup_name'];
    $res=$ob->checkSupName($sup_name);
    $nor=$res->num_rows;
    if($nor==0){    
    $r=$ob->addSupplier($sup_name);
   
        $sup_id=$con->insert_id;   
        
    }else{
        $ro=$res->fetch_assoc();
        $sup_id=$ro['sup_id'];
    }
    $r1=$ob->addOrder($sup_id);
    $po_id=$con->insert_id;
    if($r1){
        header("Location:../view/addproductorder.php?po_id=$po_id"); //Redirection 
        
    }
    
    
}
