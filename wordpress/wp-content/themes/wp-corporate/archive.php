<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Corporate
 */
get_header(); 
$blog_cat = get_theme_mod('wp_corporate_homepage_setting_blog_category',0);
$portfolio_cat = get_theme_mod('wp_corporate_innerpage_setting_portfolio_page_category',0);
$team_cat = get_theme_mod('wp_corporate_innerpage_setting_team_category',0);
$testimonial_cat = get_theme_mod('wp_corporate_homepage_setting_testimonial_category',0);
$sidebar = get_theme_mod('wp_corporate_innerpage_setting_archive_layout','right-sidebar');
$post_layout = get_theme_mod('wp_corporate_innerpage_setting_archive_post_layout','large-image');
$archive = 'archive';


if(($blog_cat != 0) && is_category( $blog_cat )):
	$sidebar = get_theme_mod('wp_corporate_innerpage_setting_blog_page_layout','right-sidebar');
	$post_layout = get_theme_mod('wp_corporate_innerpage_setting_blog_post_layout','large-image');
	$archive = 'blog';

elseif(($portfolio_cat != 0) && is_category($portfolio_cat)):
	$sidebar = get_theme_mod('wp_corporate_innerpage_setting_portfolio_page_layout','no-sidebar');
	$post_layout = 'sortable-grid';
	$archive = 'portfolio';
	


elseif(($team_cat != 0) && is_category($team_cat)):
	
	$sidebar = get_theme_mod('wp_corporate_innerpage_setting_team_layout','right-sidebar');
	$post_layout = get_theme_mod('wp_corporate_innerpage_setting_team_post_layout','list');
	$archive = 'team';
elseif(($testimonial_cat != 0) && is_category($testimonial_cat)):
	$sidebar = get_theme_mod('wp_corporate_innerpage_setting_testimonial_layout','right-sidebar');
	$post_layout = get_theme_mod('wp_corporate_innerpage_setting_team_post_layout','list');
	$archive = 'testimonial';
endif;

	?>
	<header class="page-header">
		<div class="ed-container">
			<div class="archive-page-title">
				<?php
				if ( is_category() ) :
					?>
					<h1 class="page-title">
						<?php single_cat_title();?>
					</h1>
					<?php 
				else :
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				endif;?>
			</div>
		<?php
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?></div>
	</header><!-- .page-header -->
<?php

?>
<div class="ed-container <?php echo esc_attr($archive).' '.esc_attr($post_layout);?>">
<?php
	if($sidebar=='both-sidebar'){
	    ?>
        <div class="left-sidebar-right">
    <?php
	}
 	?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) : 

					if(!empty($portfolio_cat) && is_category($portfolio_cat)):
						get_template_part('template-parts/content', 'portfolio');
					else:
					?>

					<?php
					/* Start the Loop */
						while ( have_posts() ) : the_post();


							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						the_posts_navigation();
					endif;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

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