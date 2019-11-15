<?php
if( ! function_exists( 'wp_corporate_custom_weblayout_class' ) ){
	function wp_corporate_custom_weblayout_class($classes){
		$header_class = esc_attr(get_theme_mod('wp_corporate_basic_setting_webpage_layout','fullwidth'));
		$classes[] = $header_class;
		return $classes;
	}
}
add_filter( 'body_class', 'wp_corporate_custom_weblayout_class' );

function wp_corporate_category_lists(){
	$category 	=	get_categories();
	$cat_list 	=	array();
	$cat_list[0]=	esc_html__('Select Category','wp-corporate');
	foreach ($category as $cat) {
		$cat_list[$cat->term_id]	=	$cat->name;
	}
	return $cat_list;
}

// count footer
function wp_corporate_footer_count(){
	$count = 0;
	if(is_active_sidebar('wp-corporate-footer-one'))
		$count++;

	if(is_active_sidebar('wp-corporate-footer-two'))
		$count++;

	if(is_active_sidebar('wp-corporate-footer-three'))
		$count++;

	if(is_active_sidebar('wp-corporate-footer-four'))
		$count++;

	return $count;
}


	// Function for using Slider
	function wp_corporate_slider_section_cb(){

		$slider_category = get_theme_mod('wp_corporate_header_setting_slider_category',0);
		$show_pager = esc_attr((get_theme_mod('wp_corporate_header_setting_slider_pager',0) == "1") ? "true" : "false");
		$show_controls = esc_attr((get_theme_mod('wp_corporate_header_setting_slider_controls',0) == "1") ? "true" : "false");
		$auto_transition = esc_attr((get_theme_mod('wp_corporate_header_setting_slider_transition_auto',0) == "1") ? "true" : "false");
		$auto_transition_speed = get_theme_mod('wp_corporate_header_setting_slider_transition_speed',5000);
		$slider_transition = esc_attr(get_theme_mod('wp_corporate_header_setting_slider_transition_type','slideOutLeft'));
		$slider_transition = (($slider_transition == 'backSlide') || ($slider_transition == 'slideOutLeft')  ) ? 'slideOutLeft' : 'fadeOut';
		$show_caption = esc_attr(get_theme_mod('wp_corporate_header_setting_slider_caption',0));   
		$readmore_button_link = esc_url(get_theme_mod('wp_corporate_header_setting_slider_readmore_link','#'));
		$readmore_button = esc_html(get_theme_mod('wp_corporate_header_setting_slider_readmore_text',__('Details','wp-corporate')));?>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					var rtoleft = false;
					if($('body').hasClass('rtl')){
					var rtoleft = true;
					}
					$('#ed-slider').owlCarousel({
						animateOut: '<?php echo $slider_transition; ?>',
						autoplay: <?php echo $auto_transition; ?>,
						autoplayTimeout: <?php echo $auto_transition_speed; ?>,
						autoplayHoverPause: true,
						rtl: rtoleft,
						loop: true,
						nav: <?php echo $show_controls; ?>,
						dots: <?php echo $show_pager; ?>,
						dotsData: true,
						navText: ['Prev','Next'],
						navElement: 'div',
						singleItem:true,
						items: 1,
						dots: true,
						beforeAction: function(el){ 
						//remove class active 
						this .$owlItems .removeClass('active')
						//add class active 
						this .$owlItems //owl internal $ object containing items 
						.eq(this.currentItem) .addClass('active') 
						}	
					});
					// var dot = $('#ed-slider .owl-dot');
					// dot.addClass('owl-page').removeClass('owl-dot').parent().addClass('owl-pagination').removeClass('owl-dots');
					// dot.each(function() {
					// 	$(this).parent().addClass('owl-pagination');
					// 	var index = $(this).index() + 1;
					//     $(this).html('<span class="owl-numbers">'+ index + '</span>');
					// });
					});

			</script>
			<?php
			$query = new WP_Query(array(
				'cat' => $slider_category,
				'posts_per_page' => -1    
				));?>
			<div id="ed-slider" class="owl-carousel owl-theme">
				<?php
				$i = 0;
				if($query->have_posts()) : 
					while($query->have_posts()) : 
						$i++;
						$query-> the_post();
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
						?>		                     

						<div class="slides" data-dot='<span class="owl-numbers"><?php echo esc_attr($i);?></span>' style="background-image:url('<?php echo esc_url($image[0]); ?>');" >
							<?php if($show_caption == '1'){?>
							<div class="caption-wrapper">
								<div class="slider-caption">
									<div class="slider-title"> <?php the_title(); ?></div>
									<div class = "slider-content"><?php the_excerpt();?></div>
									<a class= 'slider-viewmore ed-bttn' href="<?php echo $readmore_button_link; ?>" ><?php
									echo $readmore_button; ?> </a>
								</div>
							</div>
							<?php  }?>
						</div>
			   

					<?php 
					endwhile;
					wp_reset_postdata();
				endif;?>	

			</div>  		

		<?php
}
add_action('wp_corporate_slider','wp_corporate_slider_section_cb', 10); //slider settings without condition


function wp_corporate_header_allslider_cb(){
	if(get_theme_mod('wp_corporate_header_setting_slider_category',0) != 0):
		if(is_home() || is_front_page()){
			if ( is_page_template('tpl-homepage.php') ) {  // Default homepage 
				if(get_theme_mod('wp_corporate_homepage_setting_slider_option',0)==1 ){
					do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
				}
			} elseif ( is_front_page() ) { 
				// static homepage 
				// do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
			} elseif ( is_home() ) {  // blog page 
				if(get_theme_mod('wp_corporate_innerpage_setting_blog_page_slider',0)==1 ){
					do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
				}
			} else { 
				//everything else 
			}
		}
		elseif(is_single()){
			if(get_theme_mod('wp_corporate_innerpage_setting_single_post_slider',0) == 1){
				do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
			}
		}
		elseif(is_page() && !(is_home() || is_front_page())){
			if(get_theme_mod('wp_corporate_innerpage_setting_single_page_slider',0) == 1):
				do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
			endif;
		}
		elseif(is_archive()){
			if(!is_category()){
				if(get_theme_mod( 'wp_corporate_innerpage_setting_archive_slider', 0 ) ):
					do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
				endif;
			}
			else{
				$blog_cat = get_theme_mod( 'wp_corporate_homepage_setting_blog_category', 0 );
				$team_cat = get_theme_mod( 'wp_corporate_homepage_setting_team_category', 0 );
				$tes_cat = get_theme_mod( 'wp_corporate_homepage_setting_testimonial_category', 0 );
				$port_cat = get_theme_mod('wp_corporate_homepage_setting_portfolio_category', 0 );
				if(($blog_cat != 0) && is_category( $blog_cat )):
					if(get_theme_mod( 'wp_corporate_innerpage_setting_blog_page_slider', 0 ) ):
						do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
					endif;
				elseif(($team_cat != 0) && is_category( $team_cat )):
					if(get_theme_mod( 'wp_corporate_innerpage_setting_team_slider', 0 ) ):
						do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
					endif;
				elseif(($tes_cat != 0) && is_category( $tes_cat )):
					if(get_theme_mod( 'wp_corporate_innerpage_setting_testimonial_slider', 0 ) ):
						do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
					endif;
				elseif(($port_cat != 0) && is_category( $port_cat )):
					if(get_theme_mod( 'wp_corporate_innerpage_setting_portfolio_page_slider', 0 ) ):
						do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
					endif;
				else:
					if(get_theme_mod( 'wp_corporate_innerpage_setting_archive_slider', 0 ) ):
						do_action('wp_corporate_slider'); // action is in wp-corporate-functions.php
					endif;
				endif;
			}
		}
	endif;
}
add_action('wp_corporate_header_allslider','wp_corporate_header_allslider_cb'); //slider with condition


	//adding custom scripts and styles in header
function wp_corporate_header_scripts(){
		//Custom CSS CODE
	$custom_css = wp_filter_nohtml_kses(get_theme_mod('wp_corporate_custom_tools_css_code',''));
	if(!empty($custom_css)){
		echo "<style type='text/css' media='all' id='wp-corporate-customcss'>";
		echo $custom_css;
		echo "</style>\n";
	}
			
}
add_action('wp_head','wp_corporate_header_scripts');


// function to add social icons
	function wp_corporate_social_cb(){
		$facebooklink = esc_url( get_theme_mod('wp_corporate_social_facebook','#') );
		$twitterlink = esc_url( get_theme_mod('wp_corporate_social_twitter','#'));
		$google_pluslink = esc_url( get_theme_mod('wp_corporate_social_googleplus','#') );
		$youtubelink = esc_url( get_theme_mod('wp_corporate_social_youtube','#') );
		$pinterestlink = esc_url( get_theme_mod( 'wp_corporate_social_pinterest', '' ) );
		$linkedinlink = esc_url( get_theme_mod( 'wp_corporate_social_linkedin', '' ) );
		$vimeolink = esc_url( get_theme_mod( 'wp_corporate_social_vimeo', '' ) );
		$instagramlink = esc_url( get_theme_mod( 'wp_corporate_social_instagram', '' ) );
		$skypelink = esc_attr( get_theme_mod( 'wp_corporate_social_skype', '' ) );?>
		<div class="social-icons ">
			<?php if(!empty($facebooklink)){?>
				<a href="<?php echo $facebooklink; ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
				<?php } ?>

			<?php if(!empty($twitterlink)){?>
			<a href="<?php echo $twitterlink; ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($google_pluslink)){?>
			<a href="<?php echo $google_pluslink; ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($youtubelink)){ ?>
			<a href="<?php echo $youtubelink; ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($pinterestlink)){ ?>
			<a href="<?php echo $pinterestlink; ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($linkedinlink)){ ?>
			<a href="<?php echo $linkedinlink; ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($vimeolink)){ ?>
			<a href="<?php echo $vimeolink; ?>" class="vimeo" data-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($instagramlink)){ ?>
			<a href="<?php echo $instagramlink; ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
			<?php } ?>

			<?php if(!empty($skypelink)){ ?>
			<a href="<?php echo esc_attr('skype:', 'wp-corporate').$skypelink; ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i><span></span></a>
			<?php } ?>
		</div>
		<?php
	}
	add_action('wp_corporate_social','wp_corporate_social_cb');

class WP_Corporate_Nav_Menu extends Walker_Nav_Menu{
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
       global $wp_query;
       $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
       $class_names = $value = '';
       $classes = empty( $item->classes ) ? array() : (array) $item->classes;
       $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
       $class_names = ' class="'. esc_attr( $class_names ) . '"';

       $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

       $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
       $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
       $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


       $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';



        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'><span data-hover="'. $item->title .'">';
        $item_output .=$args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
        $item_output .= $description.$args->link_after;
        $item_output .= '</span></a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'wp_corporate_menu_start_el', $item_output, $item, $depth, $args );
    }
}