<?php 
/*
 * index.php ブログの基本表示、他の相当するテンプレファイルがない場合のデフォルト
 * 個別記事はsingle.phpに分割予定
 */
get_header();?>

<!-- メインコンテンツ群 -->
<div id="contents">
	<div class="container">
		<!-- メインバー(左) ここから -->
		<div id="main" class="col_9">
			<?php //記事が存在する場合、メインループ開始 ?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post() ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
					<?php //量が多くなればcontent.phpとして分割 ?>
				<?php endwhile; ?>
			<?php //記事が存在しない場合 ?>
			<?php else : ?>
				<article id="post-0" class="abox shadow">
					<h2 class="entry-title">404 Not found</h2>
					<div class="entry-content">
						お探しの記事は見つかりませんでした。
					</div>
				</article>
			<?php endif; ?>
			<?php //記事が1ページに表示できる数を超えたら、ページャーを表示 ?>
			<?php if ($wp_query->max_num_pages > 1) : ?>
				<div id="pager" class="abox shadow">
					<div class="next"><?php previous_posts_link(); ?></div>
					<div class="prev"><?php next_posts_link(); ?></div>
				</div>
			<?php endif; ?>
		</div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
