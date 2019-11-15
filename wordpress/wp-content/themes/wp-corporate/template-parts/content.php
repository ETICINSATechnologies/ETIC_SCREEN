<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Corporate
 */

$blog_cat = get_theme_mod('wp_corporate_homepage_setting_blog_category',0);
$portfolio_cat = get_theme_mod('wp_corporate_homepage_setting_portfolio_category',0);
$team_cat = get_theme_mod('wp_corporate_homepage_setting_team_category');
$testimonial_cat = get_theme_mod('wp_corporate_homepage_setting_testimonial_category',0);

if(!is_archive()):
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php
				if ( !is_single() ) {				
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php wp_corporate_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
					endif; 
?>
			
		</header><!-- .entry-header -->

		<div class="entry-content">		
			<?php
			if ( !is_single() ):
				if(has_post_thumbnail()):
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'wp-corporate-fullwidth-image',true);
					?>
					<figure>
						<img src="<?php echo esc_url($image[0]);?>" alt="<?php the_title_attribute();?>" title = "<?php the_title();?>"/>
					</figure>
					<?php
				endif;
			endif;
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wp-corporate' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );				
 
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wp-corporate' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span class="page-num-links">',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php 
		if ( 'post' === get_post_type() ) : ?>
			<footer class="entry-footer">
				<?php wp_corporate_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif;?>
	</article><!-- #post-## -->

<?php
elseif (!empty($testimonial_cat) && is_category($testimonial_cat)) :
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
				
			if(has_post_thumbnail()):				
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'wp-corporate-feature-image',true);
				?>
				<figure>
					<a href="<?php the_permalink();?>"><img src="<?php echo esc_url($image[0]);?>" alt="<?php the_title_attribute();?>" title = "<?php the_title();?>" /></a>
				</figure>
				<?php
			endif;
		if ( !is_single() ) {				
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">	
			<div class="content-text">
				<p>
				<?php
					the_excerpt();
				?>	
				</p>
				<a class="arhive-readmore ed-bttn" href="<?php the_permalink();?>"><?php esc_html_e('Read More','wp-corporate');?></a>
			</div>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
<?php
elseif(!empty($team_cat) && is_category($team_cat)): 
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php				
				if ( !is_single() ) {				
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}			
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">		
			<?php
				if(has_post_thumbnail()):
					$size = 'wp-corporate-feature-image';
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),$size,true);
					?>
					<figure>
						<a href="<?php the_permalink();?>"><img src="<?php echo esc_url($image[0]);?>" alt="<?php the_title_attribute();?>" title = "<?php the_title();?>" /></a>
					</figure>
					<?php
				endif;
			?>
			<div class="content-text">
				<p>
				<?php
					the_excerpt();
				?>	
				</p>
				<a class="arhive-readmore ed-bttn" href="<?php the_permalink();?>"><?php esc_html_e('Read More','wp-corporate');?></a>
			</div>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
<?php
elseif(!empty($blog_cat) && is_category($blog_cat) || is_home() ): 

$post_layout = get_theme_mod('wp_corporate_innerpage_setting_blog_post_layout','large-image');

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
				if ( !is_single() ) :				
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php wp_corporate_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php
				endif; 
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">		
			<?php
				if(has_post_thumbnail()):	
					if($post_layout != 'large-image'){
						$size= 'wp-corporate-portfolio-image';
					}
					else{
						$size = 'wp-corporate-fullwidth-image';					
					}
					
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),$size,true);
					?>
					<figure>
						<a href="<?php the_permalink();?>"><img src="<?php echo esc_url($image[0]);?>" alt="<?php the_title_attribute();?>" title = "<?php the_title();?>" /></a>
					</figure>
					<?php
				endif;
			?>
			<div class="content-text">
				<p>
				<?php
					the_excerpt();
				?>	
				</p>
				<a class="arhive-readmore ed-bttn" href="<?php the_permalink();?>"><?php esc_html_e('Read More','wp-corporate');?></a>
			</div>
		</div><!-- .entry-content -->
			<footer class="entry-footer">
				<?php wp_corporate_entry_footer(); ?>
			</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
<?php

else: 

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
				if ( !is_single() ) {				
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php wp_corporate_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; 
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">		
			<?php
				if(has_post_thumbnail()):	
					$post_layout = get_theme_mod('wp_corporate_innerpage_setting_archive_post_layout','large-image');

					if($post_layout != 'large-image'):			
						$size= 'wp-corporate-portfolio-image';
					else:
						$size = 'wp-corporate-fullwidth-image';					
					endif;
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),$size,true);
					?>
					<figure>
						<a href="<?php the_permalink();?>"><img src="<?php echo esc_url($image[0]);?>" alt="<?php the_title_attribute();?>" title = "<?php the_title();?>" /></a>
					</figure>
					<?php
				endif;
			?>
			<div class="content-text">
				<p>
				<?php
					the_excerpt();
				?>	
				</p>
				<a class="arhive-readmore ed-bttn" href="<?php the_permalink();?>"><?php esc_html_e('Read More','wp-corporate');?></a>
			</div>
		</div><!-- .entry-content -->
			<footer class="entry-footer">
				<?php wp_corporate_entry_footer(); ?>
			</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
<?php
endif;
?>