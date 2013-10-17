(function(){

$(function(){

	$(window).load(function(){

		// twitterウィジェットのスタイルの変更
		// [notice] Internet Explorer(Trident系)だとたまに効きません 爆発しろ
		$("iframe.twitter-timeline").each(function(i, iframe){ // 全てのTLに適用
			$(iframe).ready(function(){ // TLの準備ができた段階で処理
				setTimeout(function(){ // TLが読み込まれるのを待つ
					$("#tw-loading").hide();
					$(".twitter-timeline").fadeIn();
					$(iframe).contents() // twitterウィジェットのスタイルの変更
						.find(".timeline").css({"border-radius": "0px", "margin-bottom": "0"}).end()
						.find(".u-photo.avatar").css({"display": "none"}).end()
						.find(".p-author").css({"min-height": "14px", "padding": "0"}).end()
						.find(".p-nickname").css({"display": "none"}).end()
						.find(".footer").css({"display": "none"}).end()
						.find(".h-entry").css({"padding": "8px 5px", "border-bottom": "1px dotted #CCC"}).end()
						.find(".load-more").css({"display": "none"});
				}, 1000);
			})
		})

		// Firefoxだと更新した時に追従していない(読み込み直後だとscrollTopが0になっている)のでページ読み込み完了時に再取得させる
		var userAgent = window.navigator.userAgent.toLowerCase();
		if ( userAgent.indexOf("firefox") != -1 || userAgent.indexOf('gecko') != -1 ) {
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
			if ( now >= 100 )
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