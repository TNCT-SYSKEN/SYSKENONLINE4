<?php 
/*
	footer.php ふったー！
	ページの一覧もWPのメニュー管理でできそうデース
*/
?>

<!-- フッター -->
<footer>
	<div class="container">
		<div id="contents_list" class="warp">
			多分この辺りにページの一覧的なものが入ると思いたい
		</div>
		<div id="alice_carteret">
			<div class="warp">
				<div id="contact" class="col_8">
					動作確認済みブラウザ
					<i class="icon-ie"></i> <a href="windows.microsoft.com/ja-jp/internet-explorer/download-ie">InternetExplorer</a> 9+
					<i class="icon-firefox"></i> <a href="//getfirefox.jp">Firefox</a> 21+
					<i class="icon-chrome"></i> <a href="http://www.google.co.jp/intl/ja/chrome/">Google Chrome</a> 28+
				</div>
				<div id="copyright" class="col_4">&copy; 2004-2013 SYSKEN</div>
			</div>
		</div>
	</div>
</footer>

<div id="topscroll"><a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/topscroll.png"></a></div>

<!-- ロードするJavaScriptは以下に書くことをおすすめします-->
<!--<script type="text/javascript" src="./js/footerFixed.js"></script>-->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.transit.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/default.js"></script>
<?php wp_footer(); ?>
</body>
</html>