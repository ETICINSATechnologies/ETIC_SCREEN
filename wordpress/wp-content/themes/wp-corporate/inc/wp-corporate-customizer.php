<?php
function wp_corporate_custom_customizer( $wp_customize ) {
	//Adding the General Setup Panel
	$wp_customize->add_panel('wp_corporate_basic_setting',
		array(
			'priority' => '10',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Default and Basic Settings','wp-corporate'),
			'description' => __('Manage General Setups for the site','wp-corporate')
			)
		);

		//Add Default Sections to General Panel
		$wp_customize->get_section('title_tagline')->panel = 'wp_corporate_basic_setting'; //priority 20
		$wp_customize->get_section('colors')->panel = 'wp_corporate_basic_setting'; //priority 40
		$wp_customize->get_section('header_image')->panel = 'wp_corporate_basic_setting'; //priority 60
		$wp_customize->get_section('background_image')->panel = 'wp_corporate_basic_setting'; //priority 80
		$wp_customize->get_section('static_front_page')->panel = 'wp_corporate_basic_setting'; //priority 120

		//Webpage Layout
		$wp_customize->add_section(
			'wp_corporate_basic_setting_webpage_layout',
			array(
				'title'            =>       __('Web Layout Setting', 'wp-corporate'),
				'priority'         =>      '140',
				'panel'            =>      'wp_corporate_basic_setting',
				)
			);

			$wp_customize->add_setting(
				'wp_corporate_basic_setting_webpage_layout',
				array(
					'default'       =>  'fullwidth',
					'sanitize_callback' => 'wp_corporate_sanitize_radio_webpagelayout'
					)
				);

			$wp_customize->add_control(
				'wp_corporate_basic_setting_webpage_layout',
				array(
					'type' => 'radio',
					'label' => __('Website Layout', 'wp-corporate'),
					'description' => __('Choose weblayout for your Site. This setting will be applied for your Whole site.', 'wp-corporate'),
					'section' => 'wp_corporate_basic_setting_webpage_layout',
					'choices' => array(
						'fullwidth' => __('Full Width', 'wp-corporate'),
						'boxed' => __('Boxed Layout', 'wp-corporate'),
						)
					)
				);	

		require get_template_directory(). '/inc/admin-panel/wp-corporate-header-panel.php';
		require get_template_directory(). '/inc/admin-panel/wp-corporate-homepage-panel.php';
		require get_template_directory(). '/inc/admin-panel/wp-corporate-social-panel.php';
		require get_template_directory(). '/inc/admin-panel/wp-corporate-inner-panel.php';
		require get_template_directory(). '/inc/admin-panel/wp-corporate-footer-panel.php';
		require get_template_directory(). '/inc/wp-corporate-sanitize.php';
}
add_action( 'customize_register', 'wp_corporate_custom_customizer' );