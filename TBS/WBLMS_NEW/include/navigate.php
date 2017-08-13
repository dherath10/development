<?php if ($_SESSION['cat']=='Admin') { ?>
	<a href="adminpanel.php" class="links_color">Home</a><?php } ?>
    
<?php if ($_SESSION['cat']=='Librarian') { ?>
	<a href="librarianaccount.php" class="links_color">Home</a><?php } ?>
    
<?php if ($_SESSION['cat']=='Library Assistant') { ?>
	<a href="libraryassistant.php" class="links_color">Home</a><?php } ?>
            
<?php if ($_SESSION['cat']=='Teacher') { ?>
<a href="teacheraccount.php" class="links_color">Home</a>

<?php } if ($_SESSION['cat']=='Student') { ?>
<a href="studentaccount.php" class="links_color">Home</a><?php } ?>
