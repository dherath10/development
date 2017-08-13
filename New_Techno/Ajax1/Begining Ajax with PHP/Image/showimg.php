<?php
//showimg.php
$file = $_GET['thefile'];
//Check to see if the image exists.
if (!is_file($file) || !file_exists($file))
exit;
?>
<img src="<?= $file ?>" alt="" />
<p>
Change Image Size:
<a href="thumb.php?img=<?= $file ?>&amp;sml=s"
onclick="changesize('<?= $file ?>','s'); return false;">Small</a>
<a href="thumb.php?img=<?= $file ?>&amp;sml=m"
onclick="changesize('<?= $file ?>','m'); return false;">Medium</a>
<a href="thumb.php?img=<?= $file ?>&amp;sml=l"
onclick="changesize('<?= $file ?>','l'); return false;">Large</a>
</p>