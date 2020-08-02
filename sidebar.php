<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Landscape_Photography
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->


<!-- Custom Code -->

<?php
//$recent_posts = wp_get_recent_posts();
//foreach( $recent_posts as $recent ){
//	 if($recent['post_status']=="publish"){
//		if ( has_post_thumbnail($recent["ID"])) {
//			echo '<li>
//		<a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   get_the_post_thumbnail($recent["ID"], 'thumbnail'). $recent["post_title"].'</a></li> ';
//		}else{
//			echo '<li>
//		<a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a></li> ';
//		}
//	}
//}
?>

<!-- Custom Code -->
