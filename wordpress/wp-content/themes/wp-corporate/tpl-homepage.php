<?php 
/**
* Template Name: Homepage
* 
* @package WP_Corporate
*/

get_header();
$featured_section= get_theme_mod('wp_corporate_homepage_setting_featured_option',0);
$featured_page= get_theme_mod('wp_corporate_homepage_setting_featured_page_option',0);
$featured_post= get_theme_mod('wp_corporate_homepage_setting_featured_post_option',0);
//featured section start
if($featured_section && ($featured_page || $featured_post) ):
	$s_class = "";
if($featured_page && !$featured_post) {$s_class="featured-page";}
if(!$featured_page && $featured_post) {$s_class="featured-post";};
?>
<section class='ed-featured-section <?php echo esc_attr($s_class);?>'>
	<div class="ed-container">
		<?php 
		// condition for display feature page and feature post and also display only featured post and feature page is off
		if(($featured_page && $featured_post) || (!$featured_page && $featured_post)) {
			if($featured_page) {
				$page = get_theme_mod('wp_corporate_homepage_setting_featured_page','');
				if($page != 0) {
					$args_page = array('post_type' => 'page', 'page_id' => $page);
					$query_page = new WP_Query($args_page);
					if($query_page->have_posts()) {
						$query_page->the_post();
						?>
						<div class="ed-featured-page">
							<?php 
							if(has_post_thumbnail()) {
								?>
								<figure>
									<?php the_post_thumbnail('wp-corporate-feature-image');?>
								</figure>
								<?php
							}
							?>
							<div class="fpage-wrap">
								<h2 class="fpage-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								<div class="fpage-desc"><?php the_excerpt();?></div>
							</div>
						</div>
						<?php 
					}
					wp_reset_postdata();
				}
			}
			if($featured_post){ ?>
				<div class="ed-featured-post">
					<?php
					$post_cat = get_theme_mod('wp_corporate_homepage_setting_featured_post','');
					if($post_cat != 0) {
						$args_post = array('post_type' => 'post', 'cat' => $post_cat, 'posts_per_page' => 4);
						$query_post = new WP_Query($args_post);
						$number = 0;
						if($query_post->have_posts()){
							while($query_post->have_posts()){
								$query_post->the_post();
								$number++;
								?>
								<div class="featured-post">
									<span class="fpost-number"><?php echo sprintf("%02d", esc_html($number));?></span>
									<h2 class="fpost-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
									<div class="fpost-desc"><?php the_excerpt();?></div>
								</div>
								<?php
							}
							wp_reset_postdata();
						}
					}
					?>
				</div>
				<?php
			}
		}
				// For adding  Different layout for featured page when only featured_page is on 
		if($featured_page && !$featured_post){
			$page = get_theme_mod('wp_corporate_homepage_setting_featured_page','');
			if($page != 0){
				$args_page = array('post_type' => 'page', 'page_id' => $page);
				$query_page = new WP_Query($args_page);
				if($query_page->have_posts()){
					$query_page->the_post();
					$image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ),'full',true);
					?>
					<div class="ed-featured-page" style="background-image:url('<?php echo esc_url($image[0]);?>');">
						<div class="ed-container">							
							<div class="fpage-wrap">										
								<h2 class="fpage-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								<div class="fpage-desc"><?php the_excerpt();?></div>
							</div>
						</div>
					</div>
					<?php 
				}
				wp_reset_postdata();
			}
		}
		?>
	</div>
</section>
<?php 
endif;
//featured section ends
$counter_option = get_theme_mod('wp_corporate_homepage_setting_counter_option',0);
if($counter_option):
	?>	
<section class='ed-counter-section'>
	<div class="ed-container">		
		<?php
		$counter_title = get_theme_mod('wp_corporate_homepage_setting_counter_title','');
		$counter_subtitle = get_theme_mod('wp_corporate_homepage_setting_counter_subtitle','');
		$counter_desc = get_theme_mod('wp_corporate_homepage_setting_counter_desc','');
		$counter_image = get_theme_mod('wp_corporate_homepage_setting_counter_image','');
		$counter_one = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_one','0'));
		$counter_one_text = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_one_text',''));
		$counter_one_icon = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_one_icon',''));
		$counter_two = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_two','0'));
		$counter_two_text = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_two_text',''));
		$counter_two_icon = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_two_icon',''));
		$counter_three = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_three','0'));
		$counter_three_text = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_three_text',''));
		$counter_three_icon = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_three_icon',''));
		$counter_four = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_four','0'));
		$counter_four_text = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_four_text',''));
		$counter_four_icon = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_four_icon',''));
		$counter_five = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_five','0'));
		$counter_five_text = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_five_text',''));
		$counter_five_icon = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_five_icon',''));
		$counter_six = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_six','0'));
		$counter_six_text = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_six_text',''));
		$counter_six_icon = esc_attr(get_theme_mod('wp_corporate_homepage_setting_counter_six_icon',''));
		?>
		<?php 
		if(!empty($counter_image)):
			?>
		<figure class="counter-image">
			<img src="<?php echo esc_url($counter_image);?>"  />
		</figure>
		<?php 
		endif;
		?>
		<div class="counter-content">
			<div class="counter-content-text">
				<h2 class="counter-title section-title"><?php echo esc_html($counter_title);?></h2>
				<h4 class="counter-subtitle section-subtitle"><?php echo esc_html($counter_subtitle);?></h4>
				<p class="counter-desc section-desc"><?php echo esc_textarea($counter_desc);?></p>
			</div>
			<div class="counter-content-icon">
				<div class="counter-icon-wrap counter-one">
					<i class="fa <?php echo $counter_one_icon; ?>"></i>
					<p class="counter"><?php echo $counter_one;?></p>
					<p class="counter-text"><?php echo $counter_one_text; ?></p>	
				</div>
				<div class="counter-icon-wrap counter-two">
					<i class="fa <?php echo $counter_two_icon; ?>"></i>
					<p class="counter"><?php echo $counter_two;?></p>
					<p class="counter-text"><?php echo $counter_two_text; ?></p>	
				</div>
				<div class="counter-icon-wrap counter-three">
					<i class="fa <?php echo $counter_three_icon; ?>"></i>
					<p class="counter"><?php echo $counter_three;?></p>
					<p class="counter-text"><?php echo $counter_three_text; ?></p>	
				</div>
				<div class="counter-icon-wrap counter-four">
					<i class="fa <?php echo $counter_four_icon; ?>"></i>
					<p class="counter"><?php echo $counter_four;?></p>
					<p class="counter-text"><?php echo $counter_four_text; ?></p>	
				</div>
				<div class="counter-icon-wrap counter-five">
					<i class="fa <?php echo $counter_five_icon; ?>"></i>
					<p class="counter"><?php echo $counter_five;?></p>
					<p class="counter-text"><?php echo $counter_five_text; ?></p>	
				</div>
				<div class="counter-icon-wrap counter-six">
					<i class="fa <?php echo $counter_six_icon; ?>"></i>
					<p class="counter"><?php echo $counter_six;?></p>
					<p class="counter-text"><?php echo $counter_six_text; ?></p>	
				</div>

			</div>
		</div>
	</div>
</section>
<?php 
endif;
$skill_option = get_theme_mod( 'wp_corporate_homepage_setting_skill_option', 0 );
if($skill_option):
	?>	
<section class='ed-skill-section'>	
	<div class="ed-container">	
		<?php
		$skill_title = get_theme_mod('wp_corporate_homepage_setting_skill_title','');
		$skill_subtitle = get_theme_mod('wp_corporate_homepage_setting_skill_subtitle','');
		$skill_desc = get_theme_mod('wp_corporate_homepage_setting_skill_desc');
		$skill_image = get_theme_mod('wp_corporate_homepage_setting_skill_image','');
		$skill_one = esc_attr(get_theme_mod('wp_corporate_homepage_setting_skill_one', 90 ) );
		$skill_one_text = esc_attr(get_theme_mod('wp_corporate_homepage_setting_skill_one_text', esc_html__('HTML','wp-corporate')));
		$skill_two = esc_attr(get_theme_mod('wp_corporate_homepage_setting_skill_two', 90 ) );
		$skill_two_text = esc_attr(get_theme_mod('wp_corporate_homepage_setting_skill_two_text', esc_html__('PHP','wp-corporate')) );
		$skill_three = esc_attr(get_theme_mod('wp_corporate_homepage_setting_skill_three', 90 ) );
		$skill_three_text = esc_attr(get_theme_mod('wp_corporate_homepage_setting_skill_three_text', esc_html__('WORDPRESS','wp-corporate')));

		;
		?>
		<?php 
		if(!empty($skill_image)):
			?>
		<figure class="skill-image">
			<img src="<?php echo esc_url($skill_image);?>"  />
		</figure>
		<?php 
		endif;
		?>
		<div class="skill-content">				
			<div class="skill-content-text">
				<h2 class="skill-title section-title"><?php echo esc_html($skill_title);?></h2>
				<h4 class="skill-subtitle section-subtitle"><?php echo esc_html($skill_subtitle);?></h4>
				<p class="skill-desc section-desc"><?php echo esc_textarea($skill_desc);?></p>
			</div>
			<div class="skill-content-icon">
				<div class="skill-bar-wrap skill-one">
					<?php if (isset($skill_one)): ?>
						<canvas class="skill-loader" data-percentage= '<?php echo $skill_one;?>' ></canvas>
						<p class="skill-text"><?php echo $skill_one_text; ?></p>	
					<?php endif; ?>
				</div>
				<div class="skill-bar-wrap skill-two">
					<?php if (isset($skill_two)): ?>
						<canvas class="skill-loader" data-percentage= '<?php echo $skill_two;?>' ></canvas>
						<p class="skill-text"><?php echo $skill_two_text; ?></p>
					<?php endif; ?>	
				</div>
				<div class="skill-bar-wrap skill-three">
					<?php if (isset($skill_three)): ?>
						<canvas class="skill-loader" data-percentage= '<?php echo $skill_three;?>' ></canvas>
						<p class="skill-text"><?php echo $skill_three_text; ?></p>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>	
</section>
<?php 
endif;
$testimonial_option = get_theme_mod('wp_corporate_homepage_setting_testimonial_option',0);
$testimonial_cat = get_theme_mod('wp_corporate_homepage_setting_testimonial_category',0);
if($testimonial_option && $testimonial_cat):
	?>
<section class='ed-testimonial-section'>
	<div class="ed-container">
		<?php
		$testimonial_title = get_theme_mod('wp_corporate_homepage_setting_testimonial_title');
		$testimonial_subtitle = get_theme_mod('wp_corporate_homepage_setting_testimonial_subtitle');
		$testimonial_desc = get_theme_mod('wp_corporate_homepage_setting_testimonial_desc');
		?>
		<h2 class="testimonial-title section-title"><?php echo esc_html($testimonial_title);?></h2>
		<h4 class="testimonial-subtitle section-subtitle"><?php echo esc_html($testimonial_subtitle);?></h4>
		<p class="testimonial-desc section-desc"><?php echo esc_textarea($testimonial_desc);?></p>
		<div class="testimonial-slider owl-carousel owl-theme">
			<?php
			$testimonial_cat = get_theme_mod('wp_corporate_homepage_setting_testimonial_category',0);
			$testimonial_args = array('post_type' => 'post', 'cat' => $testimonial_cat, 'posts_per_page' => -1);
			$testimonial_query = new WP_Query($testimonial_args);
			if($testimonial_query->have_posts()):
				while($testimonial_query->have_posts()):
					$testimonial_query->the_post();
				?>
				<div class="testimonial-post">
					<div class="tesimonial-post-desc"><?php the_excerpt();?></div>
					<?php 
					if(has_post_thumbnail()):
						?>
					<figure class="testimonial-image">
						<?php the_post_thumbnail('wp-corporate-feature-image');?>
					</figure>
					<?php 
					endif;
					?>
					<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				</div>
			<?php endwhile;
			wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
<?php endif;
$client_option = get_theme_mod('wp_corporate_homepage_setting_client_option',0);
$client_cat = get_theme_mod('wp_corporate_homepage_setting_client_category',0);
$client_button_text = esc_html(get_theme_mod('wp_corporate_homepage_setting_client_button',''));
$client_button_link = esc_url(get_theme_mod('wp_corporate_homepage_setting_client_button_link',''));
if($client_option && $client_cat):
	?>
<section class='ed-client-section'>
	<div class="ed-container">
		<?php 
		$client_title = get_theme_mod('wp_corporate_homepage_setting_client_title','');
		$client_desc = get_theme_mod('wp_corporate_homepage_setting_client_desc','');
		?>
		<div class="client-text-wrap">
			<h2 class="client-title section-title"><?php echo esc_html($client_title);?></h2>
			<p class="client-desc section-desc"><?php echo esc_textarea($client_desc);?></p>
			<a href="<?php echo $client_button_link;?>" class = "client-button section-button"><?php echo $client_button_text;?></a>
		</div>
		<div class="client-slider owl-carousel owl-theme">
			<?php
			$client_args = array('post_type' => 'post', 'cat' => $client_cat, 'post_status' => 'publish','posts_per_page'  => -1 );
			$client_query = new WP_Query($client_args);
			while($client_query->have_posts()):
				$client_query->the_post();
			if(has_post_thumbnail()):
				?>
			<figure>
				<?php the_post_thumbnail('medium');?>
			</figure>
			<?php
			endif;
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
<?php endif;



$blog_option = get_theme_mod('wp_corporate_homepage_setting_blog_option',0);
$blog_cat = get_theme_mod('wp_corporate_homepage_setting_blog_category',0);
if($blog_option && $blog_cat):
	?>	
<section class='ed-blog-section'>
	<div class="ed-container">		
		<?php
		$blog_title = get_theme_mod('wp_corporate_homepage_setting_blog_title','');
		$blog_subtitle = get_theme_mod('wp_corporate_homepage_setting_blog_subtitle');
		$blog_desc = get_theme_mod('wp_corporate_homepage_setting_blog_desc','');
		?>
		<h2 class="blog-title section-title"><?php echo esc_html($blog_title);?></h2>
		<h4 class="blog-subtitle section-subtitle"><?php echo esc_html($blog_subtitle);?></h4>
		<p class="blog-desc section-desc"><?php echo esc_textarea($blog_desc);?></p>
		<?php
		$blog_args = array('post_type' => 'post', 'cat' => $blog_cat, 'posts_per_page' => 2);
		$blog_query = new WP_Query($blog_args);
		if($blog_query->have_posts()):
			while($blog_query->have_posts()):
				$blog_query->the_post();
			$thumb_id = get_post_thumbnail_id(get_the_ID());
			$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
			?>
			<div class="blog-post">
				<?php 
				if(has_post_thumbnail()):
					?>
				<figure class="blog-image">
					<a href="<?php the_permalink();?>">
						<?php 
						if(!empty($alt)):?>
						<h5 class="onhover-image"><?php echo esc_html($alt);?></h5>
					<?php endif;?>
					<?php the_post_thumbnail('wp-corporate-fullwidth-image');?>
				</a>
			</figure>
			<?php 
			endif;
			?>
			<div class="blog-content-wrap">
				<div class="wrap-posted">
					<span class="posted-on"><a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><?php echo esc_attr( get_the_date( 'd M Y' ) );?></a></span>
					<span class="posted-by"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo esc_attr( get_the_author() );?></a></span>				
				</div>
				<div class="blog-section-content">
					<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					<?php the_excerpt();?>
				</div>
			</div>
		</div>
	<?php endwhile;
	wp_reset_postdata();
	endif;
	?>
</div>
</section>
<?php endif;
$cta_option = get_theme_mod('wp_corporate_homepage_setting_cta_option',0);
if($cta_option):
	$cta_title = get_theme_mod('wp_corporate_homepage_setting_cta_title');
$cta_desc = get_theme_mod('wp_corporate_homepage_setting_cta_desc');
$cta_button_text = esc_html(get_theme_mod('wp_corporate_homepage_setting_cta_button'));
$cta_button_link = esc_url(get_theme_mod('wp_corporate_homepage_setting_cta_button_link',''));?>	
<section class='ed-cta-section'>
	<div class="ed-container">
		<h2 class="cta-title section-title"><?php echo esc_html($cta_title);?></h2>
		<p class="cta-desc section-desc"><?php echo esc_textarea($cta_desc);?></p>
		<a href="<?php echo $cta_button_link;?>" class = "cta-button section-button"><?php echo $cta_button_text;?></a>
	</div>
</section>
<?php
endif;
?>
<?php
get_footer();