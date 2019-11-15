<?php
	/** Eightlaw Pro Woo Tweaks **/
/////////////////////// for all woo commerce pages///////////////////////////
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
	remove_action('woocommerce_sidebar','woocommerce_get_sidebar');
	add_action('wp_corporate_sidebar','woocommerce_get_sidebar',10); // for sidebar	
	add_action('wp_corporate_breadcrumb','woocommerce_breadcrumb',10); //for breaddcrumb
	add_action('woocommerce_before_main_content', 'wp_corporate_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'wp_corporate_wrapper_end', 10);

//////////////// for all woocomerce pages ends////////////////


	add_action('woocommerce_before_shop_loop', 'wp_corporate_primary', 0);	// page header of  archive woocommerce page
	add_action('woocommerce_before_single_product', 'wp_corporate_primary', 0);// page header for single product
	
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );
	

	function wp_corporate_wrapper_start(){
		if( is_shop() ){
			$sidebar = get_theme_mod('wp_corporate_innerpage_setting_archive_layout','right-sidebar');
		}
		elseif ( is_product() ) {
			$sidebar = get_theme_mod('wp_corporate_innerpage_setting_single_post_layout','right-sidebar');
		}
		if( ( $sidebar == '' ) || ( $sidebar == 'no-sidebar' ) || ( $sidebar == 'both-sidebar' ) ):
	    	$sidebar = 'no-sidebar';
	    endif;

		echo '<header class="page-header"><div class="ed-container"><div class="archive-page-title">';
	}

	// to add primary div after breadcrumb
	function wp_corporate_primary(){		
		echo '</div>';
		do_action('wp_corporate_breadcrumb');
		echo "</div></header>";
		echo '<div class="ed-container"><div id="primary" class="content-area">';
	}

	function wp_corporate_wrapper_end(){
		echo '</div>';
		do_action('wp_corporate_sidebar');

	}

	if ( class_exists('YITH_WCWL') ) {
		if (function_exists('YITH_WCWL')) {

			add_action('woocommerce_before_shop_loop_item_title', 'wp_corporate_show_add_to_wishlist', 10 );
			function wp_corporate_show_add_to_wishlist(){
				if(class_exists( 'YITH_WCQV_Frontend' )){
					echo "<div class='whislist-quickview'>";
				}
				echo do_shortcode('[yith_wcwl_add_to_wishlist]');
			}

			add_action('woocommerce_single_product_summary', 'wp_corporate_add_to_wishlist_single_product', 35 );
			function wp_corporate_add_to_wishlist_single_product(){
				echo do_shortcode('[yith_wcwl_add_to_wishlist]');	
			}

		}
	}



	if( class_exists( 'YITH_WCQV_Frontend' ) ){

		$quick_view = YITH_WCQV_Frontend();
		remove_action('woocommerce_after_shop_loop_item', array( $quick_view, 'yith_add_quick_view_button' ), 15 );
		add_action( 'woocommerce_before_shop_loop_item_title', array( $quick_view, 'yith_add_quick_view_button' ), 10 );

		add_action( 'woocommerce_before_shop_loop_item_title',  'wp_corporate_div_after_yith_add_quick_view_button' , 10 );
		function wp_corporate_div_after_yith_add_quick_view_button(){
			if(function_exists('YITH_WCWL') ){
				echo "</div>";
			}
		}

	}




	add_filter('loop_shop_columns', 'wp_corporate_loop_columns');
	if (!function_exists('wp_corporate_loop_columns')) {
		function wp_corporate_loop_columns() {
				$xr = 4;
			return intval($xr); 
		}
	}