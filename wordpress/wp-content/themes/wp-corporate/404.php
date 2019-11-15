<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Corporate
 */

get_header(); ?>
<header class="page-header">
	<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-corporate' ); ?></h1>
</header><!-- .page-header -->
<div class="ed-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'wp-corporate' ); ?></p>
					<div class="text-404">
						<?php esc_html_e( 'Error', 'wp-corporate' );?>
						<span class="text-big"><?php esc_html_e( '404', 'wp-corporate' );?></span>
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();