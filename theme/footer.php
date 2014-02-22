<?php 
/*
	footer.php ふったー！
	ページの一覧もWPのメニュー管理でできそうデース
*/
?>

<!-- フッター -->
<footer>
	<div class="container">
		<h5>SYSKEN ONLINE - 津山高専システム研究部公式ウェブサイト</h5>
		<div id="contents_list" class="warp">
			<?php 
				$args = array(
					'theme_location' => 'footer-navi',
					'container' => false,
					'items_wrap' => '<ul id="item" class="col_8">%3$s</ul>',
				);
			?>
			<?php wp_nav_menu($args); ?>
			<div class="col_4" id="management">
				<a href="/admin">部員専用ログイン</a>
			</div>
		</div>
		<div id="alice_carteret">
			<div class="wrap">
				<div class="col_12" id="address">
					<dl>
						<dt>運営元</dt>
							<dd>津山工業高等専門学校システム研究部</dd>
						<dt>連絡先</dt>
							<dd>〒708-8509 岡山県津山市沼624-1 <img src="<?php bloginfo('template_url'); ?>/img/address.png" alt="address">(代表)</dd>
					</dl>
				</div>
			</div>
			<div class="warp">
				<div id="contact" class="col_10">
					<dl>
						<dt>テーマ</dt>
						<dd><i class="icon-github"></i><a href="//github.com/yashihei/SYSKENONLINE4">SYSKEN ONLINE ver.4</a></dd>
						<dt>動作確認済みブラウザ</dt>
						<dd><i class="icon-ie"></i><a href="//windows.microsoft.com/ja-jp/internet-explorer/download-ie">InternetExplorer</a> <i class="icon-firefox"></i><a href="//getfirefox.jp">Firefox</a> <i class="icon-chrome"></i><a href="//www.google.co.jp/intl/ja/chrome/">Google Chrome</a> (最新版)
						</dd>
					
				</div>
				<div id="copyright" class="col_2">&copy; 2003-<?php echo date('Y'); ?> SYSKEN</div>
			</div>
		</div>
	</div>
</footer>

<div id="topscroll"><a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/topscroll.png"></a></div>

<?php /* 読み込むJavaScriptはヘッダーではなく以下に書き込む */ ?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.transit.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/default.js"></script>
<?php wp_footer(); ?>
</body>
</html>