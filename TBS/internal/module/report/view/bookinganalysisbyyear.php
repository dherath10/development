<?php
include '../../../common/session.php';
include '../../../common/session_handling.php';
include '../../../common/display.php';
$user_name=$row['user_name'];

$y=$_GET['year'];


include '../model/reportmodel.php';
$obj=new report();

$arr=array();
for($i=1;$i<=12;$i++){
    $j= sprintf("%02d",$i);
    $pat=$y."-".$j;
    array_push($arr, $pat);
    
}

$month1=$arr[0];
$count1=$obj->getMonthBooking($month1);

$month2=$arr[1];
$count2=$obj->getMonthBooking($month2);

$month3=$arr[2];
$count3=$obj->getMonthBooking($month3);

$month4=$arr[3];
$count4=$obj->getMonthBooking($month4);

$month5=$arr[4];
$count5=$obj->getMonthBooking($month5);

$month6=$arr[5];
$count6=$obj->getMonthBooking($month6);

$month7=$arr[6];
$count7=$obj->getMonthBooking($month7);

$month8=$arr[7];
$count8=$obj->getMonthBooking($month8);

$month9=$arr[8];
$count9=$obj->getMonthBooking($month9);

$month10=$arr[9];
$count10=$obj->getMonthBooking($month10);

$month11=$arr[10];
$count11=$obj->getMonthBooking($month11);

$month12=$arr[11];
$count12=$obj->getMonthBooking($month12);


//$result=$obj->bookingAnalysisByDate($f,$t);
//$nor=$result->num_rows;
?>

<html>
    <head>
        <title>Taxi Booking System for Colombo Cabs</title>
        <!-- favicon -->
        <link rel="icon" href="../../../images/yellow-taxi-10035627.jpg" />
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css"
              href="../../../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css"
              href="../../../css/layout.css" />
        <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">
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
      
      
      <script type="text/javascript" src="../../../js/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Month", "No of Booking", { role: "style" } ],
        ["January",<?php echo $count1; ?>, "#b87333"],
        ["February", <?php echo $count2; ?>, "silver"],
        ["March", <?php echo $count3; ?>, "gold"],
        ["April", <?php echo $count4; ?>, "#e5e4e2"],
        ["May", <?php echo $count5; ?>, "Beige "],
        ["June", <?php echo $count6; ?>, "BurlyWood  "],
        ["July", <?php echo $count7; ?>, "Khaki  "],
        ["August", <?php echo $count8; ?>, "MediumOrchid  "],
        ["September", <?php echo $count9; ?>, "Olive "],
        ["October", <?php echo $count10; ?>, "Purple  "],
        ["November", <?php echo $count11; ?>, "Sienna  "],
        ["December", <?php echo $count12; ?>, "SlateBlue "]
        
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "No of Booking per Month",
        width: 1000,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
      
  <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Month", "No of Booking"],
        ["January",<?php echo $count1; ?>],
        ["February", <?php echo $count2; ?>],
        ["March", <?php echo $count3; ?>],
        ["April", <?php echo $count4; ?>],
        ["May", <?php echo $count5; ?>],
        ["June", <?php echo $count6; ?>],
        ["July", <?php echo $count7; ?>],
        ["August", <?php echo $count8; ?>],
        ["September", <?php echo $count9; ?>],
        ["October", <?php echo $count10; ?>],
        ["November", <?php echo $count11; ?>],
        ["December", <?php echo $count12; ?>]
        ]);

        var options = {
          title: '<?php echo $y; ?> By Month',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    </head>
    <body>
       <div id="newmain">
           <div id="newheader">
               <?php
               //To include header part
               include '../../../common/header.php'; ?>
               
           </div>
           <div id="newcontents">
               
               <div>
                   <ol class="breadcrumb">
                      
                       <li><a href="../../login/view/dashboard.php">Home</a></li>
                       <li><a href="../../report/view/report.php">Report</a></li>
                      <li class="active">
                           <a href="../../report/view/bookinganalysis.php">
                           Booking Analysis
                           </a>
                           </li>
                           <li class="active">                          
                           Booking Analysis By Year
                          
                           </li>
                       
                   </ol>
                   
                            <h3 style="padding-left: 15px">Report <small>
                                        Booking Analysis By Year</small></h3>
                   <hr />
                   <div class="container-fluid">
                   
                   
                   <?php if($row['role_id']==1){ ?>
                       
                      
                           <div class="row">
              <div class="col-lg-4">Year :  <?php echo $_GET['year']; ?></div>
              <hr />
              <div>
                           <table>
                               <tr>
                                   <th style="padding-left: 15px">Per Month</th>
                                   
                               </tr>
                               
                           </table>
                           
                           
                           
                       </div>
                               
                           </div>
                           <hr />
                           <div class="container-fluid">
                               <div class="row">
                                   <div class="col-md-2">&nbsp;</div>
                            <div class="col-md-8">
                           <div id="columnchart_values" style="width: 900px; height: 400px;"></div>
                            <div class="col-md-2">&nbsp;</div>
                            </div>
                               </div>
                           
                       <hr />
                       
                       
                       
                        <div class="row">
                                   <div class="col-md-2">&nbsp;</div>
                            <div class="col-md-8">
                           <div id="piechart_3d" style="width: 900px; height: 400px;"></div>
                            <div class="col-md-2">&nbsp;</div>
                            </div>
                               </div>
                       
                           
                           
                           </div>
   
                   <?php } ?>     
                   
                   </div>
                   
               </div>
           </div>
       </div>
    </body>