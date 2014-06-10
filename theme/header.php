<?php 
/*
 * header.php へっだー！
 */
?>
<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>

	<meta charset="UTF-8">
	
	<title><?php if (!is_front_page()) wp_title('-', true, 'right'); bloginfo('name'); ?></title>

	<!-- SEO -->
	<?php if (is_front_page()) : ?>
	<meta name="author" content="津山高専システム研究部">
	<meta name="title" content="<?php bloginfo('name') ?>">
	<meta name="keywords" content="sysken,シス研,しすけん,シスケン,システム研究部,津山高専,津山工業高等専門学校">
	<meta name="description" content="<?php bloginfo('description') ?>">
	<meta name="build" content="2003.4.1">
	<meta name="copyright" content="&copy; 2003 SYSKEN">
	<?php endif;?>
	<meta name="robots" content="index,follow">

	<!-- OGP -->
	<?php //トップページと記事のOGP?>
	<?php if (is_front_page()) : ?>
		<meta property="og:title" content="<?php bloginfo('name'); ?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="http://sysken.org/">
		<meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/logo.png">
		<meta property="og:description" content="<?php bloginfo('description') ?>">
	<?php elseif(is_single()) :?>
		<meta property="og:title" content="<?php wp_title('-', true, 'right'); bloginfo('name'); ?>">
		<meta property="og:type" content="article">
		<?php if(have_posts()) : while(have_posts()): the_post(); //?>
			<meta property="og:url" content="<?php the_permalink(); ?>">
			<meta property="og:description" content="<?php echo get_the_excerpt(); //抜粋を?>">
			<?php if(has_post_thumbnail()) ://サムネイル ?>
				<meta property="og:image" content="<?php get_thumbnail_image_url('thumbnail'); ?>">
			<?php else : ?>
				<meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/no_image.png">
			<?php endif; ?>
		<?php endwhile; endif; ?>
	<?php endif; ?>

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="stylesheet" href ="<?php bloginfo('stylesheet_url'); ?>">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/font_icons.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/978.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/default.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/animation.css">
	<?php if (is_front_page()) : ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/toppage.css">
	<?php else : ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/blog.css">
	<?php endif; ?>

	<!-- <meta name="viewport" content="width=device-width"> -->
	<?php wp_head(); ?>
</head>
<body>

<!-- ヘッダー -->
<header>
	<div class="container">
		<h1 id="logo" class="col_5">
			<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png"></a>
		</h1>
		<div class="col_3 space"></div>
		<ul id="social_link" class="col_4">
			<li id="twitter"><a href="//twitter.com/sysken"><i class="icon-twitter"></i></a></li><!--
			--><li id="github"><a href="//github.com/TNCT-SYSKEN"><i class="icon-github"></i></a></li><!--
			--><li id="niconico"><a href="//com.nicovideo.jp/community/co281688"><i class="icon-niconico"></i></a></li><!--
			--><li id="youtube"><a href="//www.youtube.com/user/systemresearchclub"><i class="icon-youtube"></i></a></li>
		</ul>
	</div>
</header>

<!-- メニュー -->
<nav>
	<ul>
		<li id="home"><a href="<?php echo home_url('/') ?>"><i class="icon-home"></i></a></li><!--
		--><?php 
			$args = array(
				'theme_location' => 'main-navi',
				'container' => false,
				'items_wrap' => '%3$s',
			);
			// 改行をコメントアウトするnav書き出し(function.php記載)
			my_nav_menu($args);
		?>
	</ul>
</nav>

<!-- ダミー -->
<div id="dummy"></div>
