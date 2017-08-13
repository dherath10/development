<?php
if(!isset($_SESSION)){
    session_start();    
}
// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//session handling - to check whether login or not
include '../../../common/session_handling.php';

$userinfo=$_SESSION['userinfo']; //To get from session
$username=$userinfo['username'];
$user_id=$userinfo['user_id'];
$role_id=$userinfo['role_id'];
$role_name=$userinfo['role_name'];
$user_image=$userinfo['user_image'];

$from=$_POST['from'];
$to=$_POST['to'];

//To get no of days
$date1=date_create($from);
$date2=date_create($to);
$diff=date_diff($date1,$date2);
$nod=$diff->format("%a");

include '../model/reportmodel.php';

$obj=new report();
$no1=$obj->getBooked(1,$from,$to);
$no2=$obj->getBooked(2,$from,$to);
$no3=$obj->getBooked(3,$from,$to);
$no4=$obj->getBooked(4,$from,$to);
$no5=$obj->getBooked(5,$from,$to);

$ava1=$nod-$no1;
$per1=round(($no1/$nod),2);
$ava2=$nod-$no2;
$per2=round(($no2/$nod),2);
$ava3=$nod-$no3;
$per3=round(($no3/$nod),2);
$ava4=$nod-$no4;
$per4=round(($no4/$nod),2);
$ava5=$nod-$no5;
$per5=round(($no5/$nod),2);


?>
<html>
    <head>
        <title>Elder's Home Management System</title>
        <link rel="icon" href="../../../images/favicon.png" />
  <link rel="stylesheet" type="text/css" 
        href="../../../bootstrap/css/bootstrap.min.css" />
  
  <link rel="stylesheet" type="text/css" href="../../../css/newlayout.css" />
  <link rel="stylesheet" type="text/css" href="../../../css/calender.css" />
  <link href="../../../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    
  <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">  </script>

      <script type="text/javascript" src="../../../js/jquery.autocomplete.pack.js"></script>
<script type="text/javascript" src="../../../js/script.js"></script>

<script type="text/javascript" src="../../../js/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'No of Slots'],
          ['BreakFsat',     <?php echo $no1; ?>],
          ['Morning Tea',      <?php echo $no2; ?>],
          ['Lunch',  <?php echo $no3; ?>],
          ['Evening Tea', <?php echo $no4; ?>],
          ['Dinner',    <?php echo $no5; ?>]
        ]);

        var options = {
          title: 'Schedule Types',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <script>
        
        function printDiv(divID) {
         
var prtContent = document.getElementById(divID);
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close(); 
        
        }
        
        
        
        
      </script>
        </script>

    </head>
    <body>
        <div id="newmain">
            <div id="newheader">
                <?php  
                //To get header part
                include '../../../common/newheader.php'; ?>
            </div>
            <div id="newcontent">
                <div id="newsidebar">
                    <?php include '../../../common/sidebar.php'; ?>
                </div>
                
                <div id="subcontent">
         <!-- To show the path -->
         <ol class="breadcrumb">
            
            <li>
                <a  class="a1" href='../../login/view/dashboard.php'>Dashboard</a></li>
            
            <li><a href="../../report/view/report.php" class="a1">Report </a></li>
            
            <li class="active">
                
                <a href="../../report/view/scheduleanalysis.php" class="a1">
                    Schedule Analysis </a></li>
           <li class="active">
                
               
                    Schedule Analysis By Type </a></li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Schedule Analysis <small>By Type</small></h3>

                    <div class="container-fluid">
                      <div id="printDiv">  
                        <hr/>
           
                        <table class="table table-responsive">
                            <tr>
                                <th>From</th>
                                <th><?php echo $from; ?></th>
                                <th>To</th>
                                <th><?php echo $to; ?></th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>                                
                            </tr>
                            <tr>
                                <th>Type</th>
                                <th>BreakFast</th>
                                <th>Morning Tea</th>
                                <th>Lunch</th>
                                <th>Evening Tea</th>
                                <th>Dinner</th>                                
                            </tr>
                            <tr>
                                <th>No Of Slots</th>
                                <td><?php echo $nod; ?>&nbsp;</td>
                                <td><?php echo $nod; ?>&nbsp;</td>
                                <td><?php echo $nod; ?>&nbsp;</td>
                                <td><?php echo $nod; ?>&nbsp;</td>
                                <td><?php echo $nod; ?>&nbsp;</td>                                
                            </tr>
                            <tr>
                                <th>Booked</th>
                                <td><?php echo $no1; ?>&nbsp;</td>
                                <td><?php echo $no2; ?>&nbsp;</td>
                                <td><?php echo $no3; ?>&nbsp;</td>
                                <td><?php echo $no4; ?>&nbsp;</td>
                                <td><?php echo $no5; ?>&nbsp;</td>                                
                            </tr>
                            <tr>
                                <th>Available</th>
                                <td><?php echo $ava1; ?>&nbsp;</td>
                                <td><?php echo $ava2; ?>&nbsp;</td>
                                <td><?php echo $ava3; ?>&nbsp;</td>
                                <td><?php echo $ava4; ?>&nbsp;</td>
                                <td><?php echo $ava5; ?>&nbsp;</td>                                
                            </tr>
                            <tr>
                                <th>Percentage</th>
                                <td><?php echo $per1; ?>%&nbsp;</td>
                                <td><?php echo $per2; ?>%&nbsp;</td>
                                <td><?php echo $per3; ?>%&nbsp;</td>
                                <td><?php echo $per4; ?>%&nbsp;</td>
                                <td><?php echo $per5; ?>%&nbsp;</td>                                
                            </tr>
                        </table>
                        
                        
                        
                   <div id="piechart_3d" style="width: 900px; height: 400px;"></div> 
                   
                        
                    </div>
                     
                        <div align="center">
                            
                            <button type="button" class="btn btn-primary"
                                    onclick="printDiv('printDiv');">
                                Print </button>
                            
                        </div>
                    </div>
                   </div>
       
            </div>
            
            
        </div>
        
        <script type="text/javascript">

$( "#dtype" ).change(function() {
	var typeid=$(this).val();
	if(typeid=='nd'){
		$(".ed_frm").fadeOut('slow');
		$(".nd_frm").fadeIn('slow');
	}else{
		$(".nd_frm").fadeOut('slow');
	$(".ed_frm").fadeIn('slow');
	}
});

</script>
    </body>
</html>