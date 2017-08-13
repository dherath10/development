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

include '../model/reportmodel.php';
$obj=new report();
$result=$obj->getPaymentByDate($from);

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
        
   
      $(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }],
    });
});
    </script>
      <script src="http://code.highcharts.com/highcharts.js"></script>      
        
      
        

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
                
                <a href="../../report/view/paymentanalysis.php" class="a1">
                    Payment Analysis </a></li>
           <li class="active">
                
               
                    Payment Analysis By Date </a></li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">Payment Analysis <small>By Date</small></h3>

                    <div class="container-fluid">
                      <div id="printDiv">  
                        <hr/>
           
                        <table class="table table-responsive">
                            <tr>
                                <th>Payment ID</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Amount</th>
                                <th>Donor Name</th>
                                                           
                            </tr>                      
                                                
                            <?php while($row=$result->fetch_assoc()){ ?>
                            <tr>
                                <th><?php echo $row['donation_id']; ?></th>
                                <td><?php echo $row['donation_date']; ?>&nbsp;</td>
                                <td><?php echo $row['donation_time']; ?>&nbsp;</td>
                                <td><?php echo $row['amount'] ?>&nbsp;</td>
                                <td><?php echo $row['donor_name'] ?>&nbsp;</td>
                                                               
                            </tr>
                            <?php } ?>
                        </table>
                        
                        
                
                     
                        <div align="center">
                            
                            <button type="button" class="btn btn-primary"
                                    onclick="printDiv('printDiv');">
                                Print </button>
                            <div id="container" style="height: 300px"></div> 
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