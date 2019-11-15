<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Corporate
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'wp-corporate' ); ?></a>
		<?php 
		$logo_alignment = 'logo-'.get_theme_mod('wp_corporate_header_settings_logo_alignment','left');
		$data_index = 1; // For section data-index        
		$header_order_str = get_theme_mod( 'wp_corporate_header_setting_reorder_order', 'slider,menu' );
		$header_order_str = explode(',', $header_order_str);
		// loop to remove null values
		foreach ($header_order_str as $key=>$val) {
			if ($val == null)
				unset($header_order_str[$key]);
		}
		$new_header_order = array_values($header_order_str);// end of removing and storing values to new array
		$reorder_attr = $new_header_order[0].'-top';
		?>
		<header id="masthead" class="site-header <?php echo esc_attr($logo_alignment) .' '. esc_attr($reorder_attr);?>" role="banner">
			<?php 
			$header_option = get_theme_mod('header_text',1);
			$header_social = esc_attr(get_theme_mod('wp_corporate_header_setting_social_option',0));
			$header_social_text = esc_html(get_theme_mod('wp_corporate_header_setting_social_text'));
			$search_option = esc_attr(get_theme_mod('wp_corporate_header_setting_search_option',0));
			$call_to = trim(wp_kses_post(get_theme_mod('wp_corporate_header_setting_callto_text')));
			if($search_option || $header_social || ($call_to != '')):?>
			<div class="top-header">
				<div class="ed-container">
					<?php 
					if($header_social):
						?>
					<div class="header-social">
						<p class="header-social-text"><?php echo esc_html($header_social_text);?></p>
						<?php do_action( 'wp_corporate_social' ); ?>
					</div>
					<?php
					endif;
					if($call_to != ''):
						?>
					<div class="header-call-to">
						<?php echo $call_to;?>
					</div>
					<?php
					endif;
					if($search_option):
						get_template_part('searchform-header');
					endif;?>				
				</div>
			</div>

			<?php 
			endif;
			// end of condition for top-header

			foreach ($new_header_order as $header) {
				if(is_home() || is_front_page() || (!is_single() && !is_page()) || ((is_single() && $header == 'menu') || (is_page() && $header == 'menu')) || ((!is_single() && !is_page()) && $header == 'slider') ){
					?>
					<section data-anchor="<?php echo esc_attr($header); ?>" class="header <?php echo esc_attr($header);?>-section" data-index="<?php echo esc_attr($data_index++); ?>">
						<?php 
						switch($header){
							case 'slider':
							do_action('wp_corporate_header_allslider');
							break;

							case 'menu':
							?>
							<div class = "ed-container">
								<div class="site-branding <?php if($header_option != 1)echo 'logo-image-only';?>">
									<?php if ( function_exists( 'the_custom_logo' ) ): 
									if(has_custom_logo()):
										?>
									<div class="site-logo">								
										<?php the_custom_logo(); ?>
									</div>										
									<?php 	
									endif;
									endif;
								// End logo check. 
									?>
									<div class="site-text">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
											<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
											<p class="site-description"><?php bloginfo( 'description' ); ?></p>
										</a>
									</div>
								</div><!-- .site-branding -->

								<nav id="site-navigation" class="main-navigation" role="navigation">
									<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wp-corporate' ); ?></button>
									<?php 
									if(has_nav_menu('primary')){
										wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'walker' => new WP_Corporate_Nav_Menu() ) );
									}
									else{
										wp_nav_menu(array('container_class' => 'menu-header'));
									}
									?>
								</nav><!-- #site-navigation -->
							</div>
							<?php
							break;
						}	
						?>
					</section>
					<?php
				}
			}
			?>
		</header><!-- #masthead -->

		<div id="content" class="site-content">