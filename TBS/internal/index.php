<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
        $path="/TBS/internal/module/login/view/";
        $uri.=$path;
	header('Location: '.$uri);
	exit;
?>