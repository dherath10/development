<?php
$role_id=$_GET['q'];
 include '../model/usermodel.php';
 //To get all modules from role table
 $objm=new module();
 $resultm=$objm->viewModule();
 //To get rights based on Module
 $objr=new rights();
?>
<div class="row">
                       <?php while($rowm=$resultm->fetch_assoc()){
                         ?>
                           <div class="col-lg-3 col-sm-3 col-md-3"
                                style="min-height: 120px">
                           <b>
                           <?php
                           echo $rowm['module_name'];
                           $m=$rowm['module_id'];
                           
                           $resultr=$objr->viewModuleRights($m);
                           ?>
                               </b><br />
                           
                               <?php while($rowr=$resultr->fetch_assoc()){
                               $r_id=$rowr['r_id'];
                              $n=$objr->getRights($role_id, $r_id);
                              $s="";
                              if($n==1){
                                  $s="checked";
                              }
                              
                               
  echo "<input type='checkbox' name='user_rights[]' value='$r_id'".$s."/> ".$rowr['r_name']."<br />";  
                           }
                           ?>
                                                        
                       </div>                                                 
                      <?php } ?>
                       </div>