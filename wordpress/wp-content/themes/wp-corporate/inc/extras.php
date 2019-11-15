<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WP_Corporate
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wp_corporate_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	$sidebar = 'right-sidebar';
	if(is_search() ):		
		$classes[] = 'no-slider';
	
	elseif(is_404() ):		
		$classes[] = 'no-slider';
		$sidebar = 'no-sidebar';

	elseif(is_home() || is_front_page()):
			if ( is_page_template('tpl-homepage.php') ) {  // Default homepage 				
				if(get_theme_mod('wp_corporate_homepage_setting_slider_option',0) == 1 && get_theme_mod('wp_corporate_header_setting_slider_category',0) != 0):
					$classes[] = 'slider';
				else:
					$classes[] = 'no-slider';
				endif;
				if(!is_page_template('tpl-homepage.php') ):
					$sidebar = 'right-sidebar';
				endif;
			} elseif ( is_front_page() ) {  // static homepage 
			} elseif ( is_home() ) {  // blog page 				
				if(get_theme_mod('wp_corporate_innerpage_setting_blog_page_slider',0) == 1 && get_theme_mod('wp_corporate_header_setting_slider_category',0) != 0):
					$classes[] = 'slider';
				else:
					$classes[] = 'no-slider';
				endif;
				if(!is_page_template('tpl-homepage.php') ):
					$sidebar = 'right-sidebar';
				endif;
			} else { 
				//everything else 
			}

	elseif(is_single()):		
		$classes[] = 'slider-in-content';
		if(get_theme_mod('wp_corporate_innerpage_setting_single_post_slider',0) == 1 && get_theme_mod('wp_corporate_header_setting_slider_category',0) != 0):
			$classes[] = 'slider';
		else:
			$classes[] = 'no-slider';
		endif;

		global $post;
		$sidebar = get_post_meta($post->ID, 'wp_corporate_sidebar_layout', true);
		if(empty($sidebar)):
			$sidebar = get_theme_mod('wp_corporate_innerpage_setting_single_post_layout','right-sidebar');
			if(empty($sidebar)):
				$sidebar = 'right-sidebar';
			endif;
		endif;
	elseif(is_page() && !(is_home() || is_front_page())):	
		if(!is_page_template())	:
			$classes[] = 'slider-in-content';
		endif;
		if(get_theme_mod('wp_corporate_innerpage_setting_single_page_slider',0)  && get_theme_mod('wp_corporate_header_setting_slider_category',0) ):
			$classes[] = 'slider';

		else:
			$classes[] = 'no-slider';
		endif;
		global $post;
		$sidebar = get_post_meta($post->ID, 'wp_corporate_sidebar_layout', true);
		if(empty($sidebar)):
			$sidebar = get_theme_mod('wp_corporate_innerpage_setting_single_page_layout','right-sidebar');
			if(empty($sidebar)):		
				$sidebar = 'right-sidebar';
			endif;;
		endif;
	elseif(is_archive() || is_category()):
		if(!is_category()):
			$sidebar = get_theme_mod('wp_corporate_innerpage_setting_archive_layout','right-sidebar');
			$slider = get_theme_mod('wp_corporate_innerpage_setting_archive_slider',0);
			if($slider == 1){
				$slider_body = 'slider';
			}
			else{
				$slider_body = 'no-slider';					
			}
		else:
			$blog_cat = get_theme_mod( 'wp_corporate_homepage_setting_blog_category', 0 );
			$team_cat = get_theme_mod( 'wp_corporate_homepage_setting_team_category', 0 );
			$tes_cat = get_theme_mod( 'wp_corporate_homepage_setting_testimonial_category', 0 );
			$port_cat = get_theme_mod('wp_corporate_homepage_setting_portfolio_category', 0 );
			$sidebar = 'right-sidebar';
			$slider_body = 'no-slider';
			if(($blog_cat != 0) && is_category( $blog_cat )):
				$sidebar = get_theme_mod('wp_corporate_innerpage_setting_blog_page_layout','right-sidebar');
				$slider = get_theme_mod('wp_corporate_innerpage_setting_blog_page_slider',0);
				if($slider == 1){
					$slider_body = 'slider';
				}
				else{
					$slider_body = 'no-slider';					
				}
			elseif(($team_cat != 0) && is_category( $team_cat )):
				$sidebar = get_theme_mod('wp_corporate_innerpage_setting_team_layout','right-sidebar');
				$slider = get_theme_mod('wp_corporate_innerpage_setting_team_slider',0);
				if($slider == 1){
					$slider_body = 'slider';
				}
				else{
					$slider_body = 'no-slider';					
				}
			elseif(($tes_cat != 0) && is_category( $tes_cat )):
				$sidebar = get_theme_mod('wp_corporate_innerpage_setting_testimonial_layout','right-sidebar');
				$slider = get_theme_mod('wp_corporate_innerpage_setting_testimonial_slider',0);
				if($slider == 1){
					$slider_body = 'slider';
				}
				else{
					$slider_body = 'no-slider';					
				}
			elseif(($port_cat != 0) && is_category( $port_cat )):
				$sidebar = get_theme_mod('wp_corporate_innerpage_setting_portfolio_page_layout','no-sidebar');
				$slider = get_theme_mod('wp_corporate_innerpage_setting_portfolio_page_slider',0);
				if($slider == 1){
					$slider_body = 'slider';
				}
				else{
					$slider_body = 'no-slider';					
				}
			else:				
				$sidebar = 'right-sidebar';
				$slider_body = 'no-slider';
			endif;
		endif;		
		$classes[] = $slider_body;
	else:
		$slider = 'no-slider';
	endif;
	if( ( $sidebar == 'right-sidebar' ) && !is_active_sidebar( 'wp-corporate-right-sidebar' ) ) {
		$sidebar = 'no-sidebar';
	}
	elseif( ( $sidebar == 'left-sidebar' ) && !is_active_sidebar( 'wp-corporate-left-sidebar' ) ) {
		$sidebar = 'no-sidebar';
	}
	elseif( ( $sidebar == 'both-sidebar' ) ) {
		if( is_active_sidebar( 'wp-corporate-left-sidebar' ) && is_active_sidebar( 'wp-corporate-right-sidebar' ) ){
			$sidebar = 'both-sidebar';
		}
		elseif( is_active_sidebar( 'wp-corporate-left-sidebar' ) && !is_active_sidebar( 'wp-corporate-right-sidebar' ) ){
			$sidebar = 'left-sidebar';
		}
		elseif( !is_active_sidebar( 'wp-corporate-left-sidebar' ) && is_active_sidebar( 'wp-corporate-right-sidebar' ) ){
			$sidebar = 'right-sidebar';
		}
		else {
			$sidebar = 'no-sidebar';
		}
	}
	else{
		$sidebar == 'no-sidebar';
	}
	$classes[] = $sidebar;
	return $classes;
}
add_filter( 'body_class', 'wp_corporate_body_classes' );