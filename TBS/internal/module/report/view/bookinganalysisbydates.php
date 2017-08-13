<?php
include '../../../common/session.php';
include '../../../common/session_handling.php';
include '../../../common/display.php';
$user_name=$row['user_name'];

$f=$_POST['from'];
$t=$_POST['to'];


include '../model/reportmodel.php';
$obj=new report();
$result=$obj->bookingAnalysisByDate($f,$t);
$nor=$result->num_rows;
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
                           Booking Analysis By Dates
                          
                           </li>
                       
                   </ol>
                   
                            <h3 style="padding-left: 15px">Report <small>
                                        Booking Analysis BY Dates</small></h3>
                   <hr />
                   <div class="container-fluid">
                   
                   
                   <?php if($row['role_id']==1){ ?>
                       
                      
                           <div class="row">
                               <div class="col-lg-2">From :</div>
                               <div class="col-lg-2">
                                   <?php echo $_POST['from']; ?></div>
                               <div class="col-lg-2">To :</div>
                               <div class="col-lg-2">
                                   <?php echo $_POST['to']; ?>                                   
                               </div> 
                               <div class="col-lg-2">No of Records :</div>
                               <div class="col-lg-2">
                                   <?php echo $nor; ?>                                   
                               </div>
                           </div>
                           <br />
                           <?php if($nor==0){                                
   echo "<div class='alert alert-danger'>No records</div>";   
                           }else{?>
                        <div id="section-to-print">
                       <table class="table table-responsive table-hover">
                           <tr>
                               <th>ID</th>
                               <th>Source</th>
                               <th>Destination</th>
                               <th>Date and Time</th>
                               <th>Class</th>
                               <th>Customer Name</th>                                                         
                           </tr> 
    <?php while($rowres=$result->fetch_assoc()) { ?>
                           <tr>
                               <td><?php echo $rowres['res_id']; ?></td>
                               <td><?php echo $rowres['res_from']; ?></td>
                               <td><?php echo $rowres['res_to']; ?></td>
                               <td><?php echo $rowres['res_date'].
                                       " ".$rowres['time']; ?></td>
                               <td><?php echo $rowres['class']; ?></td>
                               <td>                                   
<?php echo $rowres['cus_title'].". ".$rowres['cus_fname'].
        " ".$rowres['cus_lname']; ?></td>                 
                               
                           </tr>    
    <?php } ?>
                           
                       </table> 
                        </div>
                           
                           <div style="text-align: center">
           <button type="button" class="btn btn-primary" onClick="javascript:printDiv('section-to-print')">Print</button>
           <a href="bookinganalysisbydatespdf.php?from=<?php echo $f; ?>&to=<?php echo $t; ?>" target="_blank">
             <button type="button" class="btn btn-primary">PDF</button>
           </a>   
            </div>
                           
   
                           <?php } ?>  
                      
                       
                  <?php } ?>
                   
                   </div>
                   
               </div>
           </div>
       </div>
    </body>