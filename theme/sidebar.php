<?php 
/*
 * sidebar.php ページによって代わりが激しそうな…
 */
?>

<!-- サイドバー(右) ここから -->
<div id="sidebar" class="col_3">
	<?php if (is_page() || get_post_type() == 'active' || get_post_type() == 'product'): ?>
		<?php dynamic_sidebar('sidebar-2'); ?>
	<?php else : ?>
		<?php dynamic_sidebar('sidebar-1'); ?>
	<?php endif; ?>
	<aside>
		<!-- Twitter Widgets -->
		<div id="tw-widgets" class="shadow">
			<h4><i class="icon-twitter"></i>Twitter</h4>
			<a class="twitter-timeline" href="https://twitter.com/sysken" width="211" height="200" data-widget-id="364209088126664704" data-chrome="noheader nofooter noborders">@sysken からのツイート</a>
			<div id="tw-loading"><a href="//twitter.com/sysken">Twitterへ</a></div>
			<div id="tw-account">by @<a href="//twitter.com/sysken">sysken</a></div>
		</div>
	</aside>
</div>
<!-- サイドバー(右) ここまで -->
