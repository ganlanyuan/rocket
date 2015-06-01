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
  <title> <?php 
		if ($pagename == 'index') {
			echo 'Rocket';
		} 
		if ($pagename == 'layout-grid') {
			echo 'layout-grid';
		} 
		if ($pagename == 'layout-gallery') {
			echo 'layout-gallery';
		} 
		if ($pagename == 'layout-justify') {
			echo 'layout-justify';
		} 
		if ($pagename == 'layout-center') {
			echo 'layout-center';
		} 
		if ($pagename == 'layout-two-columns') {
			echo 'layout-two-columns';
		} 
		if ($pagename == 'layout-debug') {
			echo 'layout-debug';
		} 
		if ($pagename == 'slider-carousel') {
			echo 'slider-carousel';
		} 
		if ($pagename == 'slider-gallery') {
			echo 'slider-gallery';
		} 
		if ($pagename == 'components-button') {
			echo 'components-button';
		} 
		if ($pagename == 'components-media-list') {
			echo 'components-media-list';
		} 
		if ($pagename == 'components-off-canvas') {
			echo 'components-off-canvas';
		} 
		if ($pagename == 'components-dropdown') {
			echo 'components-dropdown';
		} 
		if ($pagename == 'components-tooltip') {
			echo 'components-tooltip';
		} 
		if ($pagename == 'components-flex-video') {
			echo 'components-flex-video';
		} 
		if ($pagename == 'addons-type') {
			echo 'addons-type';
		} 
		if ($pagename == 'addons-visibility') {
			echo 'addons-visibility';
		} 
		if ($pagename == 'color-contrast') {
			echo 'color-contrast';
		} 
		if ($pagename == 'color-adjacent') {
			echo 'color-adjacent';
		} 
		if ($pagename == 'color-complementary') {
			echo 'color-complementary';
		} 
		if ($pagename == 'color-split-complementary') {
			echo 'color-split-complementary';
		} 
		if ($pagename == 'color-triad') {
			echo 'color-triad';
		} 
		if ($pagename == 'color-rectangle') {
			echo 'color-rectangle';
		} 
		if ($pagename == 'color-square') {
			echo 'color-square';
		} 
  ?> </title>
	
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
	<link href='http://fonts.googleapis.com/css?family=Roboto:700,500,300' rel='stylesheet' type='text/css'>
	<link href="prism/prism.css" rel="stylesheet">
	<link href="css/normalize.css" rel="stylesheet">

  <link <?php 
		if ($pagename == 'index') {
			echo 'href="css/test.css"';
		} 
		if ($pagename == 'layout-grid') {
			echo 'href="css/layout-grid.css"';
		} 
		if ($pagename == 'layout-gallery') {
			echo 'href="css/layout-gallery.css"';
		} 
		if ($pagename == 'layout-justify') {
			echo 'href="css/layout-justify.css"';
		} 
		if ($pagename == 'layout-center') {
			echo 'href="css/layout-center.css"';
		} 
		if ($pagename == 'layout-two-columns') {
			echo 'href="css/layout-two-columns.css"';
		} 
		if ($pagename == 'layout-debug') {
			echo 'href="css/layout-debug.css"';
		} 
		if ($pagename == 'slider-carousel') {
			echo 'href="css/slider-carousel.css"';
		} 
		if ($pagename == 'slider-gallery') {
			echo 'href="css/slider-gallery.css"';
		} 
		if ($pagename == 'components-button') {
			echo 'href="css/components-button.css"';
		} 
		if ($pagename == 'components-media-list') {
			echo 'href="css/components-media-list.css"';
		} 
		if ($pagename == 'components-off-canvas') {
			echo 'href="css/components-off-canvas.css"';
		} 
		if ($pagename == 'components-dropdown') {
			echo 'href="css/components-dropdown.css"';
		} 
		if ($pagename == 'components-tooltip') {
			echo 'href="css/components-tooltip.css"';
		} 
		if ($pagename == 'components-flex-video') {
			echo 'href="css/components-flex-video.css"';
		} 
		if ($pagename == 'addons-type') {
			echo 'href="css/addons-type.css"';
		} 
		if ($pagename == 'addons-visibility') {
			echo 'href="css/addons-visibility.css"';
		} 
		if ($pagename == 'color-contrast') {
			echo 'href="css/color-contrast.css"';
		} 
		if ($pagename == 'color-adjacent') {
			echo 'href="css/color-adjacent.css"';
		} 
		if ($pagename == 'color-complementary') {
			echo 'href="css/color-complementary.css"';
		} 
		if ($pagename == 'color-split-complementary') {
			echo 'href="css/color-split-complementary.css"';
		} 
		if ($pagename == 'color-triad') {
			echo 'href="css/color-triad.css"';
		} 
		if ($pagename == 'color-rectangle') {
			echo 'href="css/color-rectangle.css"';
		} 
		if ($pagename == 'color-square') {
			echo 'href="css/color-square.css"';
		} 
  ?> rel="stylesheet">

	<!-- javascript -->
	<!--[if (lt IE 9)]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="js/ie.min.js"></script>
		
		<link href="http://externalcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
		<link href="cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
		<script src="cross-domain/respond.proxy.js"></script>	
	<![endif]-->

	<script src="prism/prism.js"></script>
	<script src="js/Modernizr.js"></script>
	<script src="js/rem.min.js"></script>
	<script src="js/index.min.js"></script>
</head>
