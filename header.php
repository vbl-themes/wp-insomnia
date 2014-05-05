<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="author" content="Ivari Horm" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,width=device-width">
	<title><?php echo bloginfo('title'); ?></title>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" id="open-sans-css" href="http://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=3.8.1" type="text/css" media="all" />
	<link rel="stylesheet" id="open-quicksand-css" href="http://fonts.googleapis.com/css?family=Quicksand%3A300&#038;ver=3.8.1" type="text/css" media="all" />
	<link rel="stylesheet" id="open-playfair-css" href="http://fonts.googleapis.com/css?family=Playfair+Display%3A400%2C700%2C400italic%2C700italic&#038;ver=3.8.1" type="text/css" media="all" />
	<link rel="stylesheet" id="open-nunito-css" href="http://fonts.googleapis.com/css?family=Nunito%3A300&#038;ver=3.8.1" type="text/css" media="all" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/main.js"></script>
	<?php wp_head(); ?>
</head>

<body onload="handleLoad(<?php echo isset($_COOKIE["screen"])?$_COOKIE["screen"]:""; ?>)" onresize="handleResize()" onscroll="handleScroll()">