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

//サイドバーを定義 
register_sidebar(array(
	'name' => 'メインサイドバー',
	'id' => 'sidebar-1',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widget-title">',
	'after_title' => '</h2>',
));

?>