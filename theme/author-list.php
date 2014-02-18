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
			<div class="abox shadow profile">
				<h2>部員一覧</h2>
				<p>システム研究部の部員一覧です。</p>
			</div>

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
				<?php $grade = get_user_grade($user); if( !$grade ) continue; ?>
				<?php $uid = $user->ID; $userData = get_userdata($uid); ?>
				<div class="abox shadow profile-box">

					<div class="name-grade-box">
						<h3 class="name"><?php echo $user->display_name; ?></h3><div class="grade"><?php echo $grade; ?></div>
					</div>
					<?php echo get_avatar( $uid ); ?>
					<div class="profile">
						<?php if ( $user->user_description ): ?>
							<p><?php echo $user->user_description; ?>
						<?php else: ?>
							<p class="descrip-none">自己紹介はありません</p>
						<?php endif; ?>
					</div>
					<div class="user-meta">
						<div class="blog-post-count">
							<?php if ( count_user_posts($uid) > 0 ): ?>
								<a href="<?php echo home_url('/')."?author=".$user->ID ?>">記事の投稿数 <?php echo count_user_posts($uid); ?>件</a>
							<?php else: ?>
								このユーザはまだ記事を書いていません
							<?php endif; ?>
						</div>
						<div class="social-account">
							<?php if ( $user->twitter ): // Twitterアカウント ?>
								<i class="icon-twitter"></i> <a href="https://twitter.com/<?php echo $user->twitter ?>"><?php echo $user->twitter ?></a>
							<?php endif; ?>
							<?php if ( $user->facebook ): // Facebookアカウント ?>
								<i class="icon-facebook-squared"></i> <a href="https://www.facebook.com/<?php echo $user->facebook ?>"><?php echo $user->facebook ?></a>
							<?php endif; ?>
							<?php if ( $user->github ): // GitHubアカウント ?>
								<i class="icon-github"></i> <a href="https://github.com/<?php echo $user->github ?>"><?php echo $user->github ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
		<?php get_sidebar() ?>

	</div>
</div>

<?php get_footer(); ?>
