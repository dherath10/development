<?php 
//To get the time according to location
date_default_timezone_set('Asia/Jayapura');
//To get the Publish Year
$my=$_GET['q1'];

//current Day
$cday=date("d");
settype($cday,"integer");
//current Month
$cmonth=date("m");
//current Year
$cyear=date("Y");

$myArr=explode("-",$my);
$m=$myArr[0];
$y=$myArr[1];

if($y==$cyear && $m==$cmonth){ //$y and $m is the year and month we select?>
	
    <select name="day1" id="day1" >
    <option selected="selected" value="">Day</option>
    <?php for($i=1;$i<$cday;$i++){ ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php } ?>
    </select>

   <?php } else { ?>
	<select name="day1" id="day1" >
    <option selected="selected" value="">Day</option>
    <?php for($i=1;$i<=31;$i++){ ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php } ?>
    </select>

<?php }
?>