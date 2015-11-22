<?php
/*
 * function.php WordPressの設定を書き込むのデース
 */

add_theme_support('post-thumbnails');
add_theme_support('menus');

add_image_size( 'eye-catch', 682, 383, true );
add_image_size( 'product-eye-catch', 310, 250, true );

register_nav_menu('main-navi', 'メインナビ' );
register_nav_menu('footer-navi', 'フッターナビ');

//register_nav_menus(array);

//サイドバーを定義
register_sidebar(array(
	'name' => 'メインサイドバー',
	'id' => 'sidebar-1',
	'before_widget' => '<aside id="%1$s" class="widget %2$s sidebox shadow">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
));

register_sidebar(array(
	'name' => '告知用',
	'id' => 'sidebar-2',
	'before_widget' => '<aside id="%1$s" class="widget %2$s picbox shadow">',
	'after_widget' => '</aside>',
));

//relのあれ
add_filter('the_category', 'remove_rel');
function remove_rel( $text ) {
	$text = str_replace(' rel="category tag"', ' rel="category"', $text);
	return $text;
}

function add_custom() {
	register_post_type('product', array(
		'label' => '作ったもの',
		'public' => true,
		'menu_position' => 5,
		'has_archive' => true,
		'hierarchical' => true,//これ追加しないとチェックボックスな選択が出来ない
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail'
		),
		'rewrite' => array(
			'slug' => 'product',
			'with_front' => false
		)
	));
	//WPのカスタム投稿productにcate(分類)を追加する
	register_taxonomy(
		'cate',//categoryにするとカテゴリ機能が飛ぶ
		'product',
		array(
			'label' => 'カテゴリ分け',
			'hierarchical' => true,
			'rewrite' => true,
		)
	);

	register_post_type('active', array(
		'label' => '活動報告',
		'public' => true,
		'menu_position' => 6,
		'has_archive' => true,
		'hierarchial' => true,
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail',
		),
		'rewrite' => array(
			'slug' => 'active',
			'with_front' => false,
		)
	));
	//flush_rewrite_rules();

	//WordTwitでpost_typeに対応させるため
	global $wp_post_types;
	$wp_post_types["post"]->labels->singular_name= "ブログ";
}
add_action('init', 'add_custom');

// カスタム投稿をRSSで表示
// http://weble.org/2011/02/17/wordpress-custom-post-type-rss
function custom_post_rss_set($query) {
	if(is_feed()) {
		$query->set('post_type',
			Array(
				'post',
				'product',
				'active'
			)
		);
		return $query;
	}
}
add_filter('pre_get_posts', 'custom_post_rss_set');

// ユーザ登録情報にいろいろ追加
function update_profile_fields( $contactmethods ) {
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['github'] = 'GitHub';
	$contactmethods['tumblr'] = 'Tumblr';
	$contactmethods['hatena'] = 'Hatena';

	$contactmethods['enterYear'] = "本科入学年(西暦)";
	$contactmethods['enterYearAdv'] = "専攻科入学年(西暦)";
	$contactmethods['exitYear'] = "中退年月(西暦/月 理由)";


	return $contactmethods;
}
add_filter('user_contactmethods','update_profile_fields',10,1);

// Get the thumbnail image URL
function get_thumbnail_image_url( $size ) {
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, $size, true);
	echo $image_url[0];
}

// 管理用のツールバーに関する変更
function customize_admin_bar_menu($wp_admin_bar) {
	$wp_admin_bar->remove_node('wp-logo');
		$wp_admin_bar->add_menu(array(
		'id'    => 'sysken-member',
		'title' => 'しすあぷ板＠2nd',
		'href'  => '/member/uploader/',
	));
}
add_action('admin_bar_menu', 'customize_admin_bar_menu', 1000);

// ユーザ情報から学年を得る
function get_user_grade($user) {
	$date = getdate();
	// 年度(4月始まり)の考え方なので4月未満は年から1を引く(2014「年」の3月は2013「年度」の3月)
	if ( $date[mon] <= 3 ) { $date[year] -= 1; }
	// 戻り値とする連想配列の初期化
	$grade = array(
		'is_active'   => false,				// 現役部員フラグ この人は現役の部員かどうか
		'is_graduate' => false,				// 卒業生フラグ   この人はすでに卒業しているかどうか
		'grade_text'  => '在籍していない',	// 「4年生」とか「部長」とか「専攻科1年生」とかのテキスト
	);
	// 部長
	if ( $user->enterYear == 1 ) {
		$grade['is_active']   = true;
		$grade['grade_text']  = "部長";
	}
	// 副部長
	else if ( $user->enterYear == 2 ) {
		$grade['is_active']   = true;
		$grade['grade_text']  = "副部長";
	}
	else if ( $user->enterYear == 3 ) {
		$grade['is_active']   = true;
		$grade['grade_text']  = "副部長代理";
	}
	// 中退
	else if ( preg_match('/^(\d{4})\/([12]?\d)( .+)?$/', $user->exitYear, $regex) ) {
		$grade['is_active']   = false;
		$grade['grade_text']  = $regex[1] . "年度" . $regex[2] . "月". $regex[3];
	}
	// 専攻科
	else if ( is_numeric($user->enterYearAdv) && $date[year] - $user->enterYearAdv >= 0 ) {
		if ( $date[year] - $user->enterYearAdv < 2 ) {
			$grade['is_active']   = true;
			$grade['grade_text']  = "専攻科" . ($date[year] - $user->enterYearAdv + 1) . "年生";
		}
		else if ( $date[year] - $user->enterYearAdv >= 2 ) {
			$grade['is_graduate'] = true;
			$grade['grade_text']  = ($user->enterYearAdv + 1)."年度卒業生(専攻科)";
		}
	}
	// 本科
	else if ( is_numeric($user->enterYear) && $date[year] - $user->enterYear >= 0 ) {
		if ( $date[year] - $user->enterYear < 5 ) {
			$grade['is_active']   = true;
			$grade['grade_text']  = ($date[year] - $user->enterYear + 1) . "年生";
		}
		else if ( $date[year] - $user->enterYear >= 5 ) {
			$grade['is_graduate'] = true;
			$grade['grade_text']  = ($user->enterYear + 4)."年度卒業生";
		}
	}
	// 連想配列を戻り値とする
	return $grade;
}
// プロフィール欄内のHTMLを許可
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter('pre_user_description', 'wp_filter_post_kses');

 // ナビゲーションメニュー（改行とタブを削除するバージョン）
function my_nav_menu( $args = array() )
{
	// 出力パラメータを保存
	$echo = ( empty($args['echo']) ? true : $args['echo'] );

	// 出力せずにコードを取得
	$args['echo'] = false;
	$html = wp_nav_menu( $args );

	// タブをなくす（wp_nav_menu の出力では行頭にしかない前提）
	$html = str_replace( "\t", '', $html );

	// 改行をなくす（コードを見やすさを優先してコメント扱いにする）
	$html = str_replace( "\r\n", "<!--\r\n-->", $html );
	$html = str_replace( "\n", "<!--\n-->", $html );
	$html = str_replace( "\r", "<!--\r-->", $html );

	// 元々の設定に基づく出力
	if ($echo) echo $html;
	else return $html;
}

// ログイン画面
function custom_login_logo() { ?>
	<style>
		.login h1 a {
			width: 300px;
			height: 80px;
			background: url("<?php bloginfo('template_url'); ?>/img/login-logo.png") no-repeat center top;
			background-size: 300px 80px;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_logo' );

?>