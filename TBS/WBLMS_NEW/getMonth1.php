<?php 
//To get the time according to location
date_default_timezone_set('Asia/Jayapura');
//To get the Publish Year
$year=$_GET['q1'];
$cmonth=date("m");
$cyear=date("Y");
if($year==$cyear){ ?>

				<select name="month2"  onchange="showDay1(this.value,<?php echo $year; ?>)" >
                <option selected="selected" value="">Month</option>
                <?php for($i=1;$i<=$cmonth;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>

<?php

}else{
?>
<select name="month2"  onchange="showDay1(this.value,<?php echo $year; ?>)">
                <option selected="selected" value="">Month</option>
                <?php for($i=1;$i<=12;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>

<?php
	

}
	

?>