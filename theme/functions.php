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
	$text = str_replace(' rel="category tag"', 'rel="category"', $text);
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
		'hierarchical' => true,
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
	register_taxonomy(
		'cate',
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
}
add_action('init', 'add_custom');

//コピペ http://www.warna.info/archives/1703/
/*
function chample_latest_posts( $wp_query ) {
    if ( is_home() && ! isset( $wp_query->query_vars['suppress_filters'] ) ) {
        $wp_query->query_vars['post_type'] = array( 'post', 'product' );
    }
}
add_action( 'parse_query', 'chample_latest_posts' ); 
*/

?>