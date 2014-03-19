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
		<div class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('eye-catch'); ?></a><a href="<?php get_thumbnail_image_url('full'); ?>" class="original-image-link"><i class="icon-picture"></i>元画像を表示</a></div>
		<?php endif; ?>
		<?php the_content('続きを読む &raquo;'); ?>
	</div>

	<?php if(is_single()): ?>
	<aside class="entry-author profile-box">
		<h4><i class="icon-user"></i> この記事を書いた部員</h4>
		<?php
			// $post->post_authorが記事を投稿しているユーザのIDらしい
			$uid   = $post->post_author;
			$user  = get_userdata( $uid );
			$grade = get_user_grade( $user );
		?>
		<?php /* アバター */ echo get_avatar( $uid ); ?>
		<div class="profile">
			<div class="name-grade-box">
				<h5 class="name"><?php echo $user->display_name; ?></h5>
				<div class="grade"><?php echo $grade['grade_text']; ?></div>
				<div class="social-accounts">
					<?php if ( $user->twitter ): // Twitterアカウント ?>
						<span class="social-account"><i class="icon-twitter"></i><a href="//twitter.com/<?php echo $user->twitter ?>"><?php echo $user->twitter ?></a></span>
					<?php endif; ?>
					<?php if ( $user->facebook ): // Facebookアカウント ?>
						<span class="social-account"><i class="icon-facebook-squared"></i><a href="//www.facebook.com/<?php echo $user->facebook ?>"><?php echo $user->facebook ?></a></span>
					<?php endif; ?>
					<?php if ( $user->github ): // GitHubアカウント ?>
						<span class="social-account"><i class="icon-github"></i><a href="//github.com/<?php echo $user->github ?>"><?php echo $user->github ?></a></span>
					<?php endif; ?>
					<?php if ( $user->tumblr ): // Tumblrアカウント ?>
						<span class="social-account"><i class="icon-tumblr-squared"></i><a href="//<?php echo $user->tumblr ?>.tumblr.com/"><?php echo $user->tumblr ?></a></span>
					<?php endif; ?>
					<?php if ( $user->hatena ): // Hatenaアカウント ?>
						<span class="social-account"><i class="icon-hatena"></i><a href="//profile.hatena.ne.jp/<?php echo $user->hatena ?>/"><?php echo $user->hatena ?></a></span>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( $user->user_description ): ?>
				<p><?php echo $user->user_description; ?>
			<?php else: ?>
				<p class="descrip-none">自己紹介文はありません</p>
			<?php endif; ?>
			<div class="write-post-list-link">
				<?php if ( count_user_posts($uid) > 0 ): ?>
					<i class="icon-article"></i><a href="<?php echo home_url('/')."blog/author/".$user->user_login ?>">この部員が他に書いた記事(<?php echo count_user_posts($uid); ?>件)</a>
				<?php else: ?>
					この部員はまだ記事を書いていません
				<?php endif; ?>
			</div>
		</div>
	</aside>
	<?php endif; ?>

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
