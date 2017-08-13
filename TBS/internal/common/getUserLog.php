<?php

$user_id=$_GET['q'];
if(!isset($GLOBALS['con'])){
include 'dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
}
include 'display.php';
$obj = new display();
$resulta=$obj->displayaUser($user_id);
$rowa=$resulta->fetch_assoc();


$sql="SELECT * FROM login, log WHERE login.user_id='$user_id' AND log.user_name=login.user_name";
$result=$con->query($sql);
$no = $result->num_rows;

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
    <big>Search By: </big><?php echo $rowa['user_fname'];?>
        </div>
        <div class="col-lg-6">
            No of Records : <?php echo $no; ?>
        </div>
    </div>
    <?php if($no!=0){ ?>
    <div class="row">
        <div class="col-lg-12">
    <?php if($no==0){
        echo "<br/> No Logged Details";
    }else{ ?>
    <table class="table" id="usermanagement">
        <tr><th>Session ID</th>
            <th>Logged Date</th>
            <th>Logged Time</th>
            <th>IP Address</th>
        </tr>
        <?php while($rowlog=$result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $rowlog['session_id']; ?></td>
            <td><?php echo $rowlog['log_date']; ?></td>
            <td><?php echo $rowlog['log_time']; ?></td>
            <td><?php echo $rowlog['ip_address']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
            </div>
    </div>
    <?php }else{ ?>
    <p class="alert-danger" align="center">No Records</p>
    <?php } ?>
</div>