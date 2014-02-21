<?php 
/*
 * function.php WordPressの設定を書き込むのデース
 */

//管理バー非表示したいとき
// function my_function_admin_bar() {
// 	return false;
// }
// add_filter('show_admin_bar' ,'my_function_admin_bar');	

//キャプション付き画像が吐くコードをHTML5化 
// いろいろあってコメントアウト、後でなんとか
// add_filter( 'img_caption_shortcode', 'my_img_caption_shortcode', 10, 3 );

// function my_img_caption_shortcode($value, $attr, $content = null) {
// 	extract(shortcode_atts(array(
// 		'id'	=> '',
// 		'align'	=> 'alignnone',
// 		'width'	=> '',
// 		'caption' => ''
// 	), $attr));
// 	if ( 1 > (int) $width || empty($caption) )
// 		return $value;
// 	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
// 	return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">'
// 	. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
// }

// add_filter('disable_captions', create_function('','return true;'));

//アクションフィック(image_add_captionがフックされてる)
// add_filter('image_send_to_editor', 'my_image_send_to_ditor', 10, 8);
// function my_image_send_to_ditor($html, $id, $caption, $title, $align, $url, $size, $alt = '') {
// 	$caption = '<figcaption>' . $caption . '</figcaption>';
// 	$html = '<figure>' . $html . $caption . '</figure>';
// 	return $html;
// }

add_theme_support('post-thumbnails');
add_theme_support('menus');

add_image_size( 'eye-catch', 682, 383, true );

//register_nav_menu('main-navi', 'メインナビ' );
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

//relのあれ
add_filter('the_category', 'remove_rel');
function remove_rel( $text ) {
	$text = str_replace(' rel="category tag"', ' rel="category"', $text);
	return $text;
}

/*
うあがー、プラグインが細かいところできないから
function add_custom() {
	register_post_type('member', array(
		'label' => 'メンバー表',
		'menu_position' => 5,
		'public' => true,
		'has_archive' => true,
		'rewrite' => array(
			'slug' => 'member',
			'with_front' => false
			)
	));
}
add_action('init', 'add_custom');

register_taxonomy(
	'grade',
	'member',
	array(
		'label' => '学年',
		'hierarchical' => true,
		'rewrite' => true
	)
);
*/

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
			'thumbnail',
			'comments'
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

//コピペ http://www.warna.info/archives/1703/
/*
function chample_latest_posts( $wp_query ) {
    if ( is_home() && ! isset( $wp_query->query_vars['suppress_filters'] ) ) {
        $wp_query->query_vars['post_type'] = array( 'post', 'product' );
    }
}
add_action( 'parse_query', 'chample_latest_posts' ); 
*/

// ユーザ登録情報にいろいろ追加
function update_profile_fields( $contactmethods ) {
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['github'] = 'GitHub';
	$contactmethods['tumblr'] = 'Tumblr';

	$contactmethods['enterYear'] = "本科入学年(西暦)";
	$contactmethods['enterYearAdv'] = "専攻科入学年(西暦)";

	
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

/*
function custom_wp_nav_menu()
{
	$args = array(
		'theme_location' => 'main-navi',
		'container' => false,
		'container_class' => " ",
		'items_wrap' => '%3$s',
		'echo' => false,
	);
	$nav = wp_nav_menu($args);
	$nav = str_replace('class=" "', '', $nav);
	$nav = '<nav><ul><li id="home"><a href="<?php echo home_url('/') ?>"><i class="icon-home"></i></a></li>' . $nav . '</ul></nav>'
	return $nav;
}
*/

// ユーザ情報から学年を得る
function get_user_grade($user) {
	$date = getdate();
	$grade = 0;
	// 部長
	if ( $user->enterYear == 1 ) {
		$grade = "部長";
	}
	// 副部長
	else if ( $user->enterYear == 2 ) {
		$grade = "副部長";
	}
	// 専攻科
	else if ( $date[mon] <= 3 && is_numeric($user->enterYearAdv) && $date[year] - $user->enterYearAdv <= 7 ) {
		$grade = "専攻科" . ($date[year] - $user->enterYearAdv) . "年生";
	}
	else if ( $date[mon] <= 4 && is_numeric($user->enterYearAdv) && $date[year] - $user->enterYearAdv <= 1 ) {
		$grade = "専攻科" . ($date[year] - $user->enterYearAdv + 1) . "年生";
	}
	// 本科 3月以前
	else if ( $date[mon] <= 3 && is_numeric($user->enterYear) && $date[year] - $user->enterYear <= 5 ) {
		$grade = ($date[year] - $user->enterYear) . "年生";
	}
	// 本科 4月以降
	else if ( $date >= 4 && is_numeric($user->enterYear) && $date[year] - $user->enterYear <= 4 ) {
		$grade = ($date[year] - $user->enterYear + 1) . "年生";
	}
	// それ以外の人(値が未入力など)は0を返すようになります
	return $grade;
}

?>