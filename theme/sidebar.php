<?php 
/*
 * sidebar.php ページによって代わりが激しそうな…
 */
?>

<!-- サイドバー(右) ここから -->
<div id="sidebar" class="col_3">
	<?php if (is_active_sidebar('sidebar-1')) : ?>
		<?php /*WP内で動的にサイドバーの小物を変えてます タグを追加するか悩みどころ*/?>
		<?php dynamic_sidebar('sidebar-1'); ?>
	<?php else: ?>
		<div class="picbox shadow" id="square"><a href="/radio"><img src="<?php bloginfo('template_url'); ?>/img/sysken_radio.png" width="222" height="222"></a></div>

		<aside>
			<!-- Twitter Widgets -->
			<div id="tw-widgets" class="shadow">
				<h4><i class="icon-twitter"></i>Twitter</h4>
				<a class="twitter-timeline" href="https://twitter.com/sysken" height="200" data-widget-id="364209088126664704" data-chrome="noheader nofooter noborders">@sysken からのツイート</a>
				<div id="tw-loading"><a href="//twitter.com/sysken">Twitterへ</a></div>
				<div id="tw-account">by @<a href="//twitter.com/sysken">sysken</a></div>
			</div>
		</aside>
	<?php endif; ?>
</div>
<!-- サイドバー(右) ここまで -->
