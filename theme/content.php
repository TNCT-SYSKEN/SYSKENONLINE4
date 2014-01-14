<?php 
/*
	content.php 記事(ぶろぐ)一つ分をパーツ化！
*/
?>

<article id="post-<?php the_ID(); ?>" class="post abox shadow">
	<div class="entry-date">
		<!-- YOJOOOO -->
		<!-- <span class="year"><?php the_time('Y'); ?>年</span> -->
		<span class="month"><?php the_time('n'); ?>月</span>
		<span class="day"><?php the_time('j'); ?></span>
	</div>
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="entry-content">
		<?php if ( has_post_thumbnail()) : ?>
		<div class="thumbnail"><a href="<?php get_thumbnail_image_url('full'); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('eye-catch'); ?></a></div>
		<?php endif; ?>
		<?php the_content('続きを読む &raquo;'); ?>
	</div>
	<div class="entry-meta">
		<span class="date">
			<i class="icon-clock"></i>
			<?php echo get_the_date() . " " . get_the_time(); ?>
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
