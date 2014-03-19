<?php 
/*
	archive-product.php カスタム投稿、作ったもの
	カスタム投稿でまとめるかも
*/
get_header();?>

<!-- メインコンテンツ群 -->
<div id="contents">
	<div class="container">
		<!-- メインバー(左) ここから -->
		<div id="main" class="col_9">
			<div class="abox shadow">
				<h2>作ったものなど</h2>
				<p>ここでは部員の製作した作品を公開しています。</p>
			</div>
      <div id="products">
			<?php while (have_posts()) : the_post() ?>
				<div class="abox shadow custom-post col_4">
					<h3 class="entry-title">
						<?php if(has_term('game', 'cate')) : ?>
							<i class="icon-game"></i>
						<?php elseif(has_term('movie', 'cate')): ?>
							<i class="icon-video"></i>
						<?php endif; ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<div class="entry-content">
						<a href="<?php the_permalink(); ?>">
							<?php if(has_post_thumbnail()) ://サムネイル ?><div class="thumbnail"><?php the_post_thumbnail('product-eye-catch'); ?></div>
							<?php else: ?><div class="thumbnail"><img src="<?php bloginfo('template_url'); ?>/img/no_image_product.png"></div>
							<?php endif; ?>
						</a>
						<?php if(has_term('movie', 'cate')): ?> <?php the_content(); ?> <?php endif; ?>
					</div>
					<div class="entry-meta">
						<span class="creater"><i class="icon-user"></i><?php the_author(); ?></span>
						<span class="sep">|</span>
						<span class="taxonomy">
							<?php if(has_term('game', 'cate')) : ?>
								<i class="icon-game"></i>
								<!-- <a href="" rel="">ゲーム</a> リンクはとりあえず先送りで-->
								ゲーム
							<?php elseif(has_term('movie', 'cate')): ?>
								<i class="icon-video"></i>
								<!-- <a href="" rel="">動画</a> -->
								動画
							<?php endif; ?>
						</span>
						<span class="sep">|</span>
						<span class="permalink"><i class="icon-link"></i><a href="<?php the_permalink(); ?>">Permalink</a></span>
					</div>
					<!--<span class="download">download</span>-->
				</div>
			<?php endwhile; ?>
			</div>
    </div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
