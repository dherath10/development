<?php echo 'Content-type: text/vnd.wap.wml'; ?>
<?php echo '<?xml version="1.0"?'.'>'; ?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.2//EN"
"http://www.wapforum.org/DTD/wml12.dtd">

<wml>
  
  <card id="card1" title="WML Response">
	<!-- To display information -->
    <p><b><big><?php echo $_GET["fre"]; ?></big></b> Expense for
      <?php echo $_GET["doe"]; ?> is <i><u><?php echo $_GET["val"]; ?></u></i>
	</p>
  </card>

</wml>