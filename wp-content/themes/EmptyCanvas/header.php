<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="<?php bloginfo('description') ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version') ?>" /><!-- Please leave for stats -->

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Comments RSS Feed" href="<?php bloginfo('comments_rss2_url') ?>"  />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />	

<?php wp_head() ?>

</head>

<body>

<div id="wrapper">

	<div id="menu">
		<ul>
			<?php wp_list_pages('title_li=&depth=1'); ?>
		</ul>	
	</div>

	<div id="header">
	
		<?php if (is_single() OR is_page()) { ?>
		<h2 id="logo"><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><span><?php bloginfo('name'); ?></span></a></h2>
		<div id="description"><?php bloginfo('description') ?></div>
		<?php
		} else { ?>
		<h1 id="logo"><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><span><?php bloginfo('name'); ?></span></a></h1>
		<div id="description"><?php bloginfo('description') ?></div>
		<?php }	?>
			
	</div><!--  #header -->
	
	<div id="container">
	
