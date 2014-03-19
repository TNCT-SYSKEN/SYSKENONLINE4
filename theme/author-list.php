<?php 
/* 
 * Template Name: authorList
 * author-list.php テンプレ
 */
get_header();?>

<!-- メインコンテンツ群 -->
<div id="contents">
	<div class="container">

		<!-- メインバー(左) ここから -->
		<div id="main" class="col_9">
			<?php while (have_posts()) : the_post() ?>
			<div class="abox shadow">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
			<?php endwhile; ?>

			<?php
				/* 入学年(enterYear)をキーにソートする */
				$args = array('fields' => 'all_with_meta');
				$users = get_users($args);
				function cmp($a, $b){
					if ($a->enterYear == $b->enterYear) {
						return ($a->ID < $b->ID ? -1 : 1);
					}
					return ($a->enterYear < $b->enterYear ? -1 : 1);
				}
				usort($users, 'cmp');
			?>
			<?php foreach ($users as $user): ?>
				<?php $grade = get_user_grade($user); if ( !$grade['is_active'] || $grade['is_graduate'] ) continue; ?>
				<?php $uid = $user->ID; ?>
				<div class="abox shadow profile-box">
					<?php echo get_avatar( $uid ); ?>
					<div class="profile">
						<div class="name-grade-box">
							<h3 class="name"><?php echo $user->display_name; ?></h3>
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
					</div>
					<div class="user-meta">
						<?php if ( count_user_posts($uid) > 0 ): ?>
							<i class="icon-article"></i><a href="<?php echo home_url('/')."blog/author/".$user->user_login ?>">この部員が書いた記事(<?php echo count_user_posts($uid); ?>件)</a>
						<?php else: ?>
							この部員はまだ記事を書いていません
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
		<?php get_sidebar() ?>

	</div>
</div>

<?php get_footer(); ?>
