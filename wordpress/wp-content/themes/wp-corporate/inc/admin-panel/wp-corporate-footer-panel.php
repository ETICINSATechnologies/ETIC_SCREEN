<?php 
//social Settings section
$wp_customize->add_panel(
	'wp_corporate_footer_setting', 
	array(
		'priority' => 70,
		'capability' => 'edit_theme_options',
		'title' => __('Footer Setting', 'wp-corporate'),
		'description' => __('Setup settings for footer of your site.','wp-corporate'),
	)
);
$wp_customize->add_section(
	'wp_corporate_footer_setting_social', 
	array(
		'priority' => 70,
		'capability' => 'edit_theme_options',
		'title' => __('Footer Social Link', 'wp-corporate'),
		'description' => __('Setup Social Setting to show in Footer.','wp-corporate'),
		'panel'	=> 'wp_corporate_footer_setting',
	)
);

$wp_customize->add_setting(
	'wp_corporate_footer_setting_social_option', 
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
	)
);

$wp_customize->add_control(
	new Wp_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_footer_setting_social_option', 
		array(
			'type' => 'switch',
			'label' => __('Enable Social Icons', 'wp-corporate'),
			'section' => 'wp_corporate_footer_setting_social',
			'setting' => 'wp_corporate_footer_setting_social_option',				      	
		)
	)
);	

$wp_customize->add_setting(
	'wp_corporate_footer_setting_social_text',
	array(
		'default' => __('Stay Connected with us','wp-corporate'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_footer_setting_social_text', 
	array(
		'type' => 'text',
		'label' => __('Enter Text', 'wp-corporate'),
		'section' => 'wp_corporate_footer_setting_social',
		'setting' => 'wp_corporate_footer_setting_social_option',		
	)  
);



		//Footer Copyright Text
$wp_customize->add_section(
	'wp_corporate_basic_setting_footer_copyright',
	array(
		'title' => __('Footer Copyright Area', 'wp-corporate'),
		'priority' => '150',
		'panel' => 'wp_corporate_footer_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_basic_setting_footer_copyright_text',array(
		'default' => '',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_basic_setting_footer_copyright_text',
	array(
		'type' => 'textarea',
		'label' => __('Footer Copyright Area Text', 'wp-corporate'),
		'description' => __('Enter text or Html to show in the footer.', 'wp-corporate'),
		'section' => 'wp_corporate_basic_setting_footer_copyright',
	)
);