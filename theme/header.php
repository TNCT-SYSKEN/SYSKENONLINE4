<?php 
/*
	header.php
*/
?>
<!DOCTYPE html>
<html lang='ja'>
<head>
	<meta charset="utf-8">

	<?php if (!is_front_page()) wp_title('|', true, 'right');
	bloginfo('name'); ?>
	<link rel="stylesheet" href ="<?php bloginfo('stylesheet_url'); ?>">

	<meta name="viewport" content="width=device-width"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container1000">
	<header>
		<h1 id="logo" class="col_5">
			<a href="<?php bloginfo('url'); ?>">
			<img src="<?php bloginfo('template_url'); ?>/img/logo.png"></a>
		</h1>
		<ul id="social_link">
			<li id="twitter" class="col_1"><a href="//twitter.com/sysken"><img src="<?php bloginfo('template_url'); ?>/img/twitter_ico.png"></a></li>
			<li id="github" class="col_1"><img src="<?php bloginfo('template_url'); ?>/img/github_ico.png"></li>
		</ul>
	</header>
</div>

<nav>
	<?php wp_nav_menu(array('theme_location'  => 'main_navi',)); ?>
</nav>
