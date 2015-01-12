<?php
  $file = basename($_SERVER['PHP_SELF']);
  $pagename = str_replace(".php","",$file); 
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie10 lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js lt-ie10" lang="en"><![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"><!--<![endif]-->
<head>
	<!-- Change this to match your local server hostname and path -->
	<!-- <base href="http://localhost:8888/new/codeset/"> --><!--[if lte IE 6]></base><![endif]-->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<!-- <meta http-equiv="cleartype" content="on"> -->
	<title>Rocket</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<!-- Prefetch DNS for external assets -->
	<link href="http://fonts.googleapis.com" rel="dns-prefetch">
	
	<!-- css -->
	<link href="https://fontastic.s3.amazonaws.com/MSJHPuJFXkve8cKEDAVMKT/icons.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:700,500' rel='stylesheet' type='text/css'>
	<link href="prism/prism.css" rel="stylesheet">
	<link href="css/normalize.css" rel="stylesheet">
	<link href="
		<?php if ($pagename == 'index') {
			echo 'css/test.css';
		} else {
			echo 'css/test2.css';
		}
		 ?>
	" rel="stylesheet">

	<!-- javascript -->
	<!--[if (lt IE 9)]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="../assets/js/lib/ie.js"></script>
		
		<link href="http://externalcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
		<link href="../assets/js/lib/cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
		<script src="../assets/js/lib/cross-domain/respond.proxy.js"></script>	
	<![endif]-->
	<?php 
		if ($pagename == 'index') {
			echo '';
		} else {
			echo '';
		}
	?>
	<script src="prism/prism.js"></script>
	<script src="js/index.min.js"></script>
</head>