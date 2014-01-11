<?php 
/* 
 * Template Name: Top
 * top.php トップページ用テンプレ
 */
get_header();?>

<div id="topimg">
	<?php the_post_thumbnail(); ?>
</div>

<!-- メインコンテンツ群 -->
<div id="contents">
	<div class="container">

		<!-- メインバー(左) ここから -->
		<div id="main" class="col_9">

			<!-- 新着情報 ここから -->
			<article id="news" class="abox shadow">
				<h2>SYSKEN ONLINE 新着情報</h2>
				<?php 
				$args = array(
					'post_type' => array('post', 'product', 'active'),
					'posts_per_page' => 10,
				);
				?>
				<?php query_posts($args); ?>
				<?//php query_posts( 'posts_per_page=5' ); ?>
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<dl>
						<?php if(get_post_type() == 'product'): ?>
						<dt class="product">product</dt>
						<dd>
							<a href="<?php bloginfo('url'); ?>/product/"><?php the_title(); ?></a>
						<?php elseif(get_post_type() == 'active'): ?>
						<dt class="active">active</dt>
						<dd>
							<a href="<?php bloginfo('url'); ?>/active/#post-<?php the_ID(); ?>"><?php the_title(); ?></a>
						<?php else: ?>
						<dt class="blog">blog</dt>
						<dd>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php endif; ?>
							<span class="date"><?php the_time('Y.n.j'); ?>
						</dd>
					</dl>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>

				<div id="last">
					<div id="rss-read"><i class="icon-rss"></i><a href="<?php bloginfo('rss2_url'); ?>">このサイトのRSSを購読する</a></div>
					<!--いつかできる-->
					<!--<div id="whats-new"><a href="#">過去の更新情報</a><i class="icon-arrow-right"></i></div>-->
				</div>

			</article>
			<!-- 新着情報 ここまで-->

			<!-- 検索ボックス -->
			<div class="abox shadow" id="top-search">
				<form action="#" method="get"> <!-- <?php echo home_url(); ?> -->
					<i class="icon-search"></i>サイト内検索
					<input type="text" name="s">
					<input type="submit" value="検索">
				</form>
				<?//php get_search_form(); ?>
			</div>

<!--
			<div class="abox shadow" id="facebook-likes">
				<p>Facebookの「○○人がいいねと言っています」を置く候補地</p>
			</div>
-->

		</div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
