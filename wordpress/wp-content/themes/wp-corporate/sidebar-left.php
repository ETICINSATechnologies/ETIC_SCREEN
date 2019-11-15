<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Corporate
 */

if ( ! is_active_sidebar( 'wp-corporate-left-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area left-sidebar" role="complementary">
	<?php dynamic_sidebar( 'wp-corporate-left-sidebar' ); ?>
</aside><!-- #secondary -->