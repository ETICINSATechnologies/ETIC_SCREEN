<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Corporate
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="ed-container">
		<?php 
		$footer_social = get_theme_mod('wp_corporate_footer_setting_social_option',0);
		if($footer_social):
			$social_footer_text = get_theme_mod('wp_corporate_footer_setting_social_text','');
		?>
		<div class="footer-social">
			<p class = 'footer-social-text'><?php echo esc_html($social_footer_text);?></p>
			<?php
			do_action('wp_corporate_social');
			?>			
		</div>

		<?php
		endif;
		if ( is_active_sidebar( 'wp-corporate-footer-one' ) ||  is_active_sidebar( 'wp-corporate-footer-two' )  || is_active_sidebar( 'wp-corporate-footer-three' )  || is_active_sidebar( 'wp-corporate-footer-four' )) : ?>
		<div class="top-footer footer-column-<?php echo esc_attr(wp_corporate_footer_count()); ?>">


			<?php if ( is_active_sidebar( 'wp-corporate-footer-one' ) ) : ?>
				<div class="footer-block-one footer-block">
					<?php dynamic_sidebar( 'wp-corporate-footer-one' ); ?>    							
				</div>
			<?php endif; ?>	

			<?php if ( is_active_sidebar( 'wp-corporate-footer-two' ) ) : ?>
				<div class="footer-block-two footer-block">	    						
					<?php dynamic_sidebar( 'wp-corporate-footer-two' ); ?>	    						
				</div>
			<?php endif; ?>	


			<?php if ( is_active_sidebar( 'wp-corporate-footer-three' ) ) : ?>
				<div class="footer-block-three footer-block">    							
					<?php dynamic_sidebar( 'wp-corporate-footer-three' ); ?>
				</div>
			<?php endif; ?>	

			<?php if ( is_active_sidebar( 'wp-corporate-footer-four' ) ) : ?>
				<div class="footer-block-four footer-block">    						
					<?php dynamic_sidebar( 'wp-corporate-footer-four' ); ?>    		                     
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="site-info">
		<?php
		$copyright = get_theme_mod('wp_corporate_basic_setting_footer_copyright_text','');
		if($copyright && $copyright!=""){
			echo wp_kses_post($copyright)." ";
		}?>
		<?php esc_html_e( 'WordPress Theme : ', 'wp-corporate' );  ?><a  title="<?php echo esc_html_e('Free WordPress Theme','wp-corporate');?>" href="<?php echo esc_url( __( 'https://8degreethemes.com/wordpress-themes/wp-corporate/', 'wp-corporate' ) ); ?>"><?php esc_html_e( 'WP Corporate', 'wp-corporate' ); ?> </a>
		<span><?php echo esc_html_e(' by 8Degree Themes','wp-corporate');?></span>
	</div><!-- .site-info -->
</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<div id="back-to-top"><i class="fa fa-long-arrow-up"></i></div>
<?php wp_footer(); ?>
</body>
</html>