<?php 
/*
	single.php 個別記事表示用(米欄とか追加)のてんぷれ
*/
get_header();?>

<!-- メインコンテンツ群 -->
<div id="contents">
	<div class="container">
		<!-- メインバー(左) ここから -->
		<div id="main" class="col_9">
			<?php while (have_posts()) : the_post() ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
				<!-- TODO: なびげーしょん-->
				<div id="pager" class="abox shadow">
					<div class="next"><?php previous_post_link('%link', '&laquo; %title'); ?></div>
					<div class="prev"><?php next_post_link('%link', '%title &raquo;'); ?></div>
				</div>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
