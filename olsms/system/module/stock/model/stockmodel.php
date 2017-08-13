<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;

class stock{
    
    function getID($name,$table,$field){
         $con=$GLOBALS['con'];
 $sql="SELECT * FROM $table WHERE $field='$name'";
 $result=$con->query($sql); //To execute query
 $row=$result->fetch_array();
 return $row[0];
        
    }

function addStock($quantity,$p_id,$p_size,$sup_id,$user_id,$stock_price){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO stock VALUES('','$quantity',now(),'$stock_price','$p_id',"
                . "'$p_size','Active','$sup_id','','$user_id')";
        $result=$con->query($sql);
        return $result;
    
}

function addStockBalance($quantity,$p_id,$p_size){
        $con=$GLOBALS['con'];
        
        $sqlp="SELECT * FROM stock_balance WHERE p_id='$p_id' AND size_id='$p_size'";
        $resultp=$con->query($sqlp);
        $nop=$resultp->num_rows;
        
        if($nop==0){
        $sql="INSERT INTO stock_balance VALUES('$p_id','$quantity','$p_size')";
        }else{
        
            $rowp=$resultp->fetch_assoc();
            $cbalance=$rowp['balance']; //TO get current balance
            $balance=$cbalance+$quantity;
         
       $sql="UPDATE stock_balance SET balance='$balance' WHERE p_id='$p_id' AND size_id='$p_size'";   
        }
        $result=$con->query($sql);
        return $result;
    
}

function viewAllStock(){
         $con=$GLOBALS['con'];
 $sql="SELECT * FROM stock s,supplier su,product p,size si WHERE "
         . "p.p_id=s.p_id AND s.sup_id=su.sup_id AND si.size_id=s.size_id";
 $result=$con->query($sql); //To execute query
 
 return $result;
        
    }

function viewAllStockBalance(){
         $con=$GLOBALS['con'];
 $sql="SELECT p_id,size_id,sum(stock_qua) as sq 
     FROM stock GROUP BY p_id,size_id";
 $result=$con->query($sql); //To execute query
 
 return $result;
        
    }
    
    function viewStockBalance($p_id,$size_id){
         $con=$GLOBALS['con'];
 $sql="SELECT p.p_name,p.p_image, sum(c.qua) as cq FROM cart c,orders o, product p WHERE c.p_id='$p_id' AND c.size_id='$size_id' AND o.order_status='Success' AND p.p_id=c.p_id";
 $result=$con->query($sql); //To execute query
 
 return $result;
        
    }
function viewProduct($p_id){
         $con=$GLOBALS['con'];
 $sql="SELECT * FROM product WHERE p_id='$p_id'";
 $result=$con->query($sql); //To execute query
 
 return $result;
        
    }

    
    
    
    
    
}

    
    



?>
