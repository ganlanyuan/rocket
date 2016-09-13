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
  <title> 
	  <?php 
			if ($pagename == 'index') {
				echo 'Rocket';
			} else {
				echo 'Rocket - ' . $pagename;
			}
	  ?> 
  </title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<!-- Prefetch DNS for external assets -->
	<link href="http://fonts.googleapis.com" rel="dns-prefetch">
	
	<!-- css -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:700,500,300' rel='stylesheet' type='text/css'>
	<link href="prism/prism.css" rel="stylesheet">
	<link href="css/normalize.css" rel="stylesheet">

  <link <?php 
  	echo 'href="css/' . $pagename . '.css"';
  ?> rel="stylesheet">

	<!-- javascript --> 
	<!--[if (lt IE 9)]>
		<script src="js/html5.js"></script>
		<script src="js/ie.min.js"></script>
		
		<link href="http://externalcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
		<link href="cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
		<script src="cross-domain/respond.proxy.js"></script>	
	<![endif]-->

	<script src="prism/prism.js"></script>
	<script src="js/Modernizr.js"></script>
	<script src="../dist/kit.min.js"></script>
</head>
