<?php
function webstrap_style_configurator( $wp_customize ) {

	/*=========================================
	Style Configurator Settings Section
	=========================================*/
	$wp_customize->add_panel( 
		'style_configurator', 
		array(
			'priority'      => 131,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Style Configurator', 'webstrap'),
		) 
	);

	
	/*=========================================
	Pre Built Colors Settings Section
	=========================================*/
	// Footer Setting Section // 
	$wp_customize->add_section(
        'prebuilt_colors',
        array(
            'title' 		=> __('Prebuilt Theme Color','webstrap'),
            'description' 	=>'',
			'panel'  		=> 'style_configurator',
		)
    );
	
	//Pre Built Colors
	class Webstrap_color_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

		   function render_content()
		   {
		   echo '<h3>' .  __( 'Select Your Prebuilt Theme Color', 'webstrap' ) . '</h3>';
			  $name = '_customize-color-radio-' . $this->id; 
			  foreach($this->choices as $key => $value ) {
				?>
				   <label>
					<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
					<img <?php if($this->value() == $key){ echo 'class="selected_img"'; } ?> src="<?php echo get_stylesheet_directory_uri(); ?>/images/color/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
					</label>
					
				<?php
			  } ?>
			
			  <script>
				jQuery(document).ready(function($) {
					$("#customize-control-theme_color label img").click(function(){
						$("#customize-control-theme_color label img").removeClass("selected_img");
						$(this).addClass("selected_img");
					});
				});
			  </script>
			  <?php 
		   }

	}
	
	 //Theme Color Scheme
	$wp_customize->add_setting(
	'theme_color', array(
	'default' => 'color-two.css',  
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'specia_sanitize_text',
    ));
	$wp_customize->add_control(new Webstrap_color_Customize_Control($wp_customize,'theme_color',
	array(
        'label'   => __('Select Your Theme Color', 'webstrap'),
        'section' => 'prebuilt_colors',
		'type' => 'radio',
		'settings' => 'theme_color',	
		'choices' => array(
			'deafult.css' => 'default.png',
			'color-one.css' => 'color-one.png',
			'color-two.css' => 'color-two.png',
			'color-three.css' => 'color-three.png',
			'color-four.css' => 'color-four.png',
			'color-five.css' => 'color-five.png',
			'color-six.css' => 'color-six.png',
			'color-seven.css' => 'color-seven.png',
			'color-eight.css' => 'color-eight.png',
			'color-nine.css' => 'color-nine.png',
    )
	)));
}

add_action( 'customize_register', 'webstrap_style_configurator' );
?>