<?php 
/*
	archive-active.php カスタム投稿、活動報告
*/
get_header();?>

<!-- メインコンテンツ群 -->
<div id="contents">
	<div class="container">
		<!-- メインバー(左) ここから -->
		<div id="main" class="col_9">
			<div class="abox shadow">
				<h2>活動報告</h2>
				<?php while (have_posts()) : the_post() ?>
					<div class="custom-post">
						<h3 class="entry-title"><?php the_title(); ?></a></h2>
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
