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
						.find(".header").css({"padding": "0px", "min-height": "0px"}).end()
						.find(".timeline").css({"border-radius": "0px", "margin-bottom": "0"}).end()
						.find(".u-photo.avatar").css({"display": "none"}).end()
						.find(".p-author").css({"padding": "0"}).end()
						.find(".p-nickname").css({"display": "none"}).end()
						.find(".footer").css({"display": "none"}).end()
						.find(".h-entry").css({"padding": "8px 5px", "border-bottom": "1px dotted #CCC"}).end()
						.find(".load-more").css({"display": "none"});
				}, 1000);
			})
		})

	});

	$(window).scroll(function(){
		var now = $(this).scrollTop();
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

	// フッターリストをどうにかこうにか
	{
		// 多分生まれてから初めてdo/while文をまともに使ったかもしれない
		do {
				$("#item").children(".menu-item:lt(4)").wrapAll('<ul class="line"></ul>')
		} while ( $("#item").children("li").length );
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
