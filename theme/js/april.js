//			 　　 /＼／＼/＼∧
//			 　 ＜４月バーカ！＞
//			 　　 Ｖ＼/＼／＼/
//			 ＼　　　　｜　　　 ／
//			 　＼　　 ＿＿_　 ／
//			 　　　　/　　 ヽ
//			 ＼　ｍ {0}/"ヽ{0}ｍ ／
//			 　 ｜っ| ヽ_ノ　と｜         エイプリルフール用スクリプト
//			 　／ ム　 `ｰ′　ム ＼
//			 （＿＿　　　　　_＿＿)    ----------------------------------
//			 ＿＿ ｜　　　　｜＿＿＿
//			 　　／　　　　 /               Marqueeをいっぱい足すよ
//			 　 /　　　　 ／
//			 　｜　/＼＿ノ￣￣ヽ
//			 ／｜ ｜　　￣￣/　ﾉ
//			 　/　ﾉ　　　　｜ /　＼
//			 `/ ／　　　　 ﾉ /                  (C) 2014 SYSKEN
//			 / ｜ 　　　　(_ ＼                 The MIT License
//			 ＼_) 　　　　　＼_)

$(function(){

	$("p").each(function(){
		addMarquee($(this), true, true);
	});
	$("dd").each(function(){
		addMarquee($(this), true, false);
	});
	$("img").each(function(){
		addMarquee($(this), false, false);
	});


	$('<div>一時的に表示を元に戻す</div>')
	.css({'position': 'fixed', 'top': '30px', 'right': '20px', 'background': '#000', 'padding': '.3em 1em', 'border-radius': '5px', 'color': '#FFF', 'opacity': '0.5', 'cursor': 'pointer'})
	.insertAfter("#topscroll")
	.mouseenter(function(){
		$(this).stop().animate({'opacity': '0.8'});
	})
	.mouseleave(function(){
		$(this).stop().animate({'opacity': '0.5'});
	})
	.click(function(){
		$("p").unwrap("<marquee></marquee>");
		$("dd").unwrap("<marquee></marquee>");
		$("img").unwrap("<marquee></marquee>");
		$(this).hide();
	});

});

function addMarquee($this, behavior_alternate, direction_updown) {

	var marquee_attr = {
		"behavior": ["scroll", "alternate"],
		"direction": ["right", "left", "up", "down"]
	};

	var behavior = marquee_attr.behavior[Math.floor(Math.random()* (behavior_alternate ? 2 : 1) )];
	var direction = marquee_attr.direction[Math.floor(Math.random()* (direction_updown ? 4 : 2) )];
	var scrollamount = Math.floor(Math.random()*20+1);

	var height = '';
	if ( direction == 'up' || direction == 'down' ) { height = 'height="100"'; }

	$this.wrap('<marquee behavior="'+behavior+'" direction="'+direction+'" scrollamount="'+scrollamount+'" '+height+'></marquee>');

}