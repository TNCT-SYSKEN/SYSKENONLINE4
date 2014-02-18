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

			<?php $users = get_users( array('orderby'=>ID,'order'=>ASC ) ); ?>
			<?php foreach ($users as $user): ?>
				<?php
					/*
						学校にまだ在籍しているかどうかをなんとかして見極めます。
					*/
					$date = getdate();
					$grade = 0;
					// 本科 3月以前
					if ( $date[mon] <= 3 && $date[year] - $user->enterYear <= 5 ) {
						$grade = $date[year] - $user->enterYear . "年生";
					}
					// 本科 4月以降
					else if ( $date >= 4 && $date[year] - $user->enterYear <= 4 ) {
						$grade = $date[year] - $user->enterYear + 1 . "年生";
					}
					// 専攻科
					else if ( $date[mon] <= 3 && $user->enterYear && $user->enterYearAdv - $date[year] <= 2 ) {
						$grade = "専攻科" . $date[year] - $user->enterYear . "年生";
					}
					else if ( $date[mon] <= 4 && $user->enterYear && $user->enterYearAdv - $date[year] <= 1 ) {
						$grade = "専攻科" . $date[year] - $user->enterYear + 1 . "年生";
					}
					// 部長
					else if ( $user->enterYear == 1 ) {
						$grade = "部長";
					}
					// 副部長
					else if ( $user->enterYear == 2 ) {
						$grade = "副部長";
					}
					// それ以外の人(値が未入力など)はスキップします
					else { continue };
				?>
				<?php $uid = $user->ID; $userData = get_userdata($uid); ?>
				<div class="abox shadow">

					<h3><?php echo $user->display_name."(".$user->ID.")"; ?></h3><span><?php echo $grade; ?></span>
					<?php echo get_avatar( $uid ); ?>
					<p><?php echo $user->user_description ?></p>

					<p>しすけんぶろぐへの投稿数 <?php echo count_user_posts($uid); ?>件</p>

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
			<?php endforeach; ?>

		</div>
		<?php get_sidebar() ?>

	</div>
</div>

<?php get_footer(); ?>
