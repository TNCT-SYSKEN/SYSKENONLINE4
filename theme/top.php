<?php 
/* 
 * Template Name: Top
 * top.php トップページ用テンプレ
 */
get_header();?>

<div id="topimg">
	<img src="http://sysken.org/images/topimage/706C7567696D616E.jpg">
</div>

<!-- メインコンテンツ群 -->
<div id="contents">
	<div class="container">

		<!-- メインバー(左) ここから -->
		<div id="main" class="col_9">

			<!-- 新着情報 ここから -->
			<article id="news" class="abox shadow">
				<h2>SYSKEN ONLINE 新着情報</h2>
				<dl>
					<dt class="blog">blog</dt>
					<dd>
						<a href="/blog/20130730_001.html">タブレットでDebian、タブレットでoneko</a>
						<span class="date">2013.07.30</span>
					</dd>
				</dl>
				<dl>
					<dt class="blog">blog</dt>
					<dd>
						<a href="/blog/20130722_001.html">Windows8.1を使ってみて</a>
						<span class="date">2013.07.22</span>
					</dd>
				</dl>
				<dl>
					<dt class="member">member</dt>
					<dd>
						<a href="/member/">部員一覧が更新されました</a>
						<span class="date">2013.07.18</span>
					</dd>
				</dl>
				<dl>
					<dt class="other">ohter</dt>
					<dd>
						<a href="/radio/">しすけんらじお特設ページを公開しました</a>
						<span class="date">2013.05.16</span>
					</dd>
				</dl>
				<dl>
					<dt class="product">product</dt>
					<dd>
						<a href="/product/anime_sidonia.html">シドニアの騎士をネット公開しました</a>
						<span class="date">2013.03.12</span>
					</dd>
				</dl>
				<dl>
					<dt class="active">active</dt>
					<dd>
						<a href="/active/computerfes2013.html">コンピュータフェスティバルに参加しました</a>
						<span class="date">2013.03.12</span>
					</dd>
				</dl>

				<div id="last">
					<div id="rss-read"><i class="icon-rss"></i><a href="/rss.rdf">このサイトのRSSを購読する</a></div>
					<div id="whats-new"><a href="#">過去の更新情報</a><i class="icon-arrow-right"></i></div>
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
			</div>

			<div class="abox shadow" id="facebook-likes">
				<p>Facebookの「○○人がいいねと言っています」を置く候補地</p>
			</div>

		</div>
		<!-- メインバー(左) ここまで -->

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer(); ?>
