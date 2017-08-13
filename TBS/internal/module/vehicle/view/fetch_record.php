<?php

$id = $_POST['rowid'];
echo $id;

?>

<!-- Modal content-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Model</h4>
      </div>
      <div class="modal-body">
          <form method="post" action="../controller/vehiclecontroller.php?action=model">
                  
          <div class="row">
              <div class="col-lg-3"><h4>Make</h4></div> <div class="col-lg-3"><?php echo $_POST['rowid']; ?></div>
          </div>
          <div class="row">
              <div class="col-lg-3"><h4>Model</h4></div> <div class="col-lg-3"><input type="text" class="input-sm" name="model_name" id="model_name" required=""></div>
          </div>
          <div class="row">
              <div class="col-lg-3"></div> <div class="col-lg-3"><button type="submit" class="btn btn-primary">Add</button></div>
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>