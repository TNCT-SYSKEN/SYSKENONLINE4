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
					<?php //量が多くなればcontent.phpとして分割 ?>
					<article id="post-<?php the_ID(); ?>" class="post abox shadow" <?php //post_class('abox shadow');?>>
						<div class="entry-date">
							<!-- <span class="year"><?php the_time('Y'); ?>年</span> -->
							<span class="month"><?php the_time('n'); ?>月</span>
							<span class="day"><?php the_time('j'); ?></span>
						</div>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						<div class="entry-meta">
							<span class="date">
								<i class="icon-clock"></i>
								<?php echo get_the_date(); ?>
							</span>
							<span class="sep"> | </span>
							<span class="author">
								<i class="icon-user"></i>
								<?php the_author(); ?>
							</span>
							<span class="sep"> | </span>
							<span class="category">
								<i class="icon-tags"></i>
								<?php the_category(' '); ?>
							</span>
							<span class="sep"> | </span>
							<?php //左から0件の場合、1件の場合、それ以上の場合 ?>
							<span class="comment">
								<i class="icon-comment"></i>
								<?php comments_popup_link('コメントをどうぞ', '1件のコメント', '%件のコメント'); ?>
							</span>
						</div>
					</article>
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
				<div id="pager">
					<div class="prev"><?php next_posts_link(); ?></div>
					<div class="next"><?php previous_posts_link(); ?></div>
				</div>
			<?php endif; ?>
		</div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
