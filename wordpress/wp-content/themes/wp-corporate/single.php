<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Corporate
 */


get_header(); ?>
<header class="page-header">
	<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
</header><!-- .page-header -->

<div class="ed-container">
	<?php 
	global $post;
	$sidebar = get_post_meta($post->ID, 'wp_corporate_sidebar_layout', true);
	if(empty($sidebar)){
		$sidebar= get_theme_mod('wp_corporate_innerpage_setting_single_page_layout','right-sidebar');
	}
	if($sidebar=='both-sidebar'){
		?>
		<div class="left-sidebar-right">
			<?php
		}
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php 
				if(has_post_thumbnail()):
					?>
				<figure class="wp-corporate-page-fig">
					<?php the_post_thumbnail('wp-corporate-fullwidth-image');?>
				</figure>
				<?php
				endif;
				do_action('wp_corporate_header_allslider');?>
				<?php
				while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );
					// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				endwhile; // End of the loop.
				the_post_navigation();
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php 
		if($sidebar=='left-sidebar' || $sidebar=='both-sidebar'){
			get_sidebar('left');
		}
		if($sidebar=='both-sidebar'){
			?>
		</div>
		<?php
	}
	if($sidebar=='right-sidebar' || $sidebar=='both-sidebar'){
		get_sidebar('right');
	}
	?>
</div>
<?php
get_footer();