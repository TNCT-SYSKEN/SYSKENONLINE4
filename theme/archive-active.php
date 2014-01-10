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
				<p>システム研究部として参加した大会などの活動一覧です。</p>
			</div>
			<?php while (have_posts()) : the_post() ?>
				<div class="abox shadow custom-post">
					<h3 class="entry-title"><?php the_title(); ?></h3>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
					<div class="entry-meta">活動日 <i class="icon-calendar"></i><?php echo get_the_date(); ?></div>
				</div>
			<?php endwhile; ?>
		</div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
