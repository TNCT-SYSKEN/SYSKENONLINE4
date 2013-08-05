(function(){
$(function(){
	$(window).load(function(){
		// twitterウィジェットのスタイルの変更
		// [notice] Internet Explorer(Trident系)だとなぜか効きません 爆発しろ
		$("iframe#twitter-widget-0").contents()
			.find(".timeline").css({"border-radius": "0px", "margin-bottom": "0"}).end()
			.find(".u-photo.avatar").css({"display": "none"}).end()
			.find(".p-author").css({"min-height": "14px", "padding": "0"}).end()
			.find(".p-nickname").css({"display": "none"}).end()
			.find(".footer").css({"display": "none"}).end()
			.find(".h-entry").css({"padding": "8px 5px", "border-bottom": "1px dotted #CCC"}).end()
			.find(".load-more").css({"display": "none"});
		// ウィジェットを置くのは他人のサイトなんだからその人のサイトのデザインに合わせれられるようにするべきだ
		// なんで丸角だ アイコンだ 見にくくなるだけだ リプライやリツイートをウィジェットからする人間なんて１日に１００人と居ないだろ 
		// なのにTwitterとかいう会社はカスタマイズ性の低い使えないウィジェットしか提供していない
		// ブランドイメージ？そんなもんウィジェットだけでつけられるもんじゃないはずだし
		// そもそも悪意あるスタイルってなんだ そんなことでできる印象操作なんてたかが知れているだろ
		// というかAPIを1.0に戻せ
		// 以上 ここの作業でほとんど１日を消費してしまった人の意見でした

		// Firefoxだと更新した時に追従していない(読み込み直後だとscrollTopが0になっている)のでページ読み込み完了時に再取得させる
		var userAgent = window.navigator.userAgent.toLowerCase();
		if (userAgent.indexOf("firefox") != -1 || userAgent.indexOf('gecko') != -1) {
			showFixedNavigation($(this).scrollTop());
		}

	});

	$(window).scroll(function(){
		var now = $(this).scrollTop();
		// 追従ヘッダー
		showFixedNavigation(now);
		// ページトップへ戻るの表示
		{
			// ある程度スクロールしたら表示する
			if ( now >= 300 )
				$("#topscroll img").fadeIn();
			else
				$("#topscroll img").fadeOut();
		}
	});

	// ページトップへ戻る関連
	{
		// マウスオーバーで色を濃くしてついでに回転もする
		$("#topscroll img")
			.mousedown(function(){
				$("html,body").animate({"scrollTop": 0}, 500, "swing");
			})
			.mouseenter(function(){
					$(this).stop().transition({"opacity": 0.5, "rotate": "180deg"});
			})
			.mouseleave(function(){
					$(this).stop().transition({"opacity": 0.3, "rotate": "0deg"});
			});
	}

});

// 追従ナビゲーション
function showFixedNavigation (now) {
	
	var header = $("header").outerHeight(true);
	if ( now >= header ) {
		$("nav").addClass("fixed_navi");
		$("#dummy").show();
	}
	else if ( now < header ) {
		$("nav").removeClass("fixed_navi");
		$("#dummy").hide();
	}
		
}

})();
