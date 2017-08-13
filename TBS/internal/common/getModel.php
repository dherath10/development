<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($GLOBALS['con'])){
include 'dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
}
$make_id=$_GET['q'];
include 'display.php';
$obj = new display();
$resulta=$obj->displayModel($make_id);


?>
                    <select name="model_id" id="model_id" class="input-sm">
                                   <option value="">Select a Model</option>
                                   <?php while($rowa=$resulta->fetch_assoc()){ ?>
                                   <option value="<?php echo $rowa['model_id']; ?>"><?php echo $rowa['model_name']; ?></option>
                                   <?php } ?>
                            
                               </select>

<i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" data-id="<?php echo $make_id; ?>">Add</button></i>
