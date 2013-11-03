<?php 
/*
	page.php 固定ページ(About,LinkなどHTML書き換えればいいやみたいな)のテンプレ
*/
get_header();?>

<!-- メインコンテンツ群 -->
<div id="contents">
	<div class="container">
		<!-- メインバー(左) ここから -->
		<div id="main" class="col_9">
			<?php while (have_posts()) : the_post() ?>
				<article id="post-<?php the_ID(); ?>" class="post abox shadow">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		</div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
