<?php 					
	$hide_show_contact_infos= get_theme_mod('hide_show_contact_infos','1'); 
?>
<section id="specia-header" class="header_webstrap_light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-5 col-xs-12 contact_phone">
				<?php  
					$header_contact= get_theme_mod('header_contact_num',''); 
				?>
				<?php if($hide_show_contact_infos == '1') { ?>
					<!-- Start Contact Info -->
					
						<?php if($header_contact) { ?>
							<div class="info_details">
								<div class="icon"><i class="fa fa-phone-square"></i></div>
								<a href="tell:<?php echo esc_attr($header_contact); ?>"><?php echo esc_html($header_contact); ?></a>
							</div>
						<?php } ?>
					
					<!-- /End Contact Info -->
				<?php } ?>
			</div>
			
			<div class="col-md-6 col-sm-7 webstrap-logo">
				<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>" class="brand">
					<?php
						if(has_custom_logo())
						{	
							the_custom_logo();
						}
						else { 
					?> 
						<span class="site-title"><?php echo esc_html(bloginfo('name')); ?></span>
					<?php	
						}
					?>
					
					<?php
						$description = get_bloginfo( 'description');
						if ($description) : ?>
							<p class="site-description"><?php echo esc_html($description); ?></p>
					<?php endif; ?>
				</a>
			</div>
			
			

            <div class="col-md-3 col-sm-7 contact_email">
				<?php 
					$header_email= get_theme_mod('header_email',''); 
				?>
				<?php if($hide_show_contact_infos == '1') { ?>
						<?php if($header_email) { ?> 
							<div class="info_details">
								<div class="icon"><i class="fa fa-envelope"></i></div>
								<a href="mailto:<?php echo esc_attr($header_email); ?>"><?php echo esc_html($header_email); ?></a>
							</div>
						<?php } ?>
					<!-- /End Contact Info -->
				<?php } ?>
			</div>
        </div>
    </div>
</section>

<div class="clearfix"></div>