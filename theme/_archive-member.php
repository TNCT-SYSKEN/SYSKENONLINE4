<?php 
/*
	archive-member.php メンバーリスト(カスタム投稿)の一覧のテンプレ
*/
get_header();?>

<!-- メインコンテンツ群 -->
<div id="contents">
	<div class="container">
		<!-- メインバー(左) ここから -->
		<div id="main" class="col_9">
			<?php while (have_posts()) : the_post() ?>
				<h3 class="entry-title"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
