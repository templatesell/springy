<?php

//Function for nav menu dropdown
// function springy_dropdown_class ($classes, $item) {
//     if (in_array('menu-item-has-children', $classes) ){
//         $classes[] = 'ts_dropdown';
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class' , 'springy_dropdown_class', 10 , 2 );

//Function to add class in sub menu
// function springy_new_submenu_class($menu) {    
//     $menu = preg_replace('/ class="sub-menu"/','/ class="drop-list" /', $menu);        
//     return $menu;      
// }
// add_filter('wp_nav_menu','springy_new_submenu_class');




//estimated reading time of post
function springy_reading_time() {
	global $post;
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
	if ($readingtime == 1) {
	$timer = esc_html__(' Min Read', 'springy');
	} else {
	$timer = esc_html__(' Min Read', 'springy');
	}
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}