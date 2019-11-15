<?php
//Add New Panel for topheader Setups
$wp_customize->add_panel(
	'wp_corporate_header_setting',
	array(
		'priority' => '20',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Header Settings', 'wp-corporate' ),
		'description' => __( 'Setup header of the site.', 'wp-corporate' ),
	)
);

/* Reorder Header Section */
$wp_customize->add_section(
	'wp_corporate_header_setting_reorder',
	array(
		'title' => __('Reorder Header', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'panel' => 'wp_corporate_header_setting',
		'priority' => 0,
	)
);

		// Section Reorder Control
$wp_customize->add_setting( 
	'wp_corporate_header_setting_reorder_order', 
	array( 
		'default' 			=> 'slider,menu,',
		'sanitize_callback' => 'sanitize_text_field' 
	)
);

$wp_customize->add_control( 
	new WP_Corporate_Section_ReOrder( 
		$wp_customize, 
		'wp_corporate_header_setting_reorder_order',
		array(
			'label' => __( 'Reorder Header', 'wp-corporate' ),
			'section' => 'wp_corporate_header_setting_reorder',
			'description' => __('Drag and drop to reorder header items.', 'wp-corporate'),
			'settings' => 'wp_corporate_header_setting_reorder_order',
			'choices' => array(
				'slider' => __('Slider', 'wp-corporate'),
				'menu' => __('Menu', 'wp-corporate'),
			),
		)
	)
);

	//Slider Baisc setup sections
$wp_customize->add_section(
	'wp_corporate_header_setting_slider',
	array(
		'priority'        => '10',
		'title' => __( 'Slider Setting', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'description' => __( 'Setup the slider settings for header', 'wp-corporate' ),
		'panel' => 'wp_corporate_header_setting'
	)
);

		//select category for slider
$wp_customize->add_setting(
	'wp_corporate_header_setting_slider_category',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control( 
	'wp_corporate_header_setting_slider_category', 
	array(
		'type'	=>	'select',
		'label' => __('Select a category to show in slider','wp-corporate'),
		'section' => 'wp_corporate_header_setting_slider',
		'choices' => wp_corporate_category_lists(),
	)
);

$wp_customize->add_setting(
	'wp_corporate_header_setting_slider_readmore_link',
	array(
		'default' => '#',
		'sanitize_callback' => 'esc_url'
	)
);

$wp_customize->add_control(
	'wp_corporate_header_setting_slider_readmore_link',
	array(
		'type' => 'text',
		'label' => __('Readmore button link', 'wp-corporate'),
		'section' => 'wp_corporate_header_setting_slider',
	)
	
);


$wp_customize->add_setting(
	'wp_corporate_header_setting_slider_readmore_text',
	array(
		'default' => __('Details','wp-corporate'),
		'sanitize_callback' => 'wp_corporate_sanitize_text'
	)
);

$wp_customize->add_control(
	'wp_corporate_header_setting_slider_readmore_text',
	array(
		'type' => 'text',
		'label' => __('Readmore button text', 'wp-corporate'),
		'section' => 'wp_corporate_header_setting_slider',
	)
	
);

$wp_customize->add_setting(
	'wp_corporate_header_setting_slider_caption',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_header_setting_slider_caption',
		array(
			'type' => 'switch',
			'label' => __('Slider Caption', 'wp-corporate'),
			'description' => __('Select Yes to show titles and description over Slider', 'wp-corporate'),
			'section' => 'wp_corporate_header_setting_slider',
		)
	)
);

$wp_customize->add_setting(
	'wp_corporate_header_setting_slider_pager',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_header_setting_slider_pager',
		array(
			'type' => 'switch',
			'label' => __('Slider Pager', 'wp-corporate'),
			'section' => 'wp_corporate_header_setting_slider',
		)
	)
);

$wp_customize->add_setting(
	'wp_corporate_header_setting_slider_controls',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_header_setting_slider_controls',
		array(
			'type' => 'switch',
			'label' => __('Slider Controls', 'wp-corporate'),
			'section' => 'wp_corporate_header_setting_slider',
		)
	)
);

$wp_customize->add_setting(
	'wp_corporate_header_setting_slider_transition_auto',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_header_setting_slider_transition_auto',
		array(
			'type' => 'switch',
			'label' => __('Auto Transition', 'wp-corporate'),
			'section' => 'wp_corporate_header_setting_slider',
		)
	)
);

		//transition type
$wp_customize->add_setting(
	'wp_corporate_header_setting_slider_transition_type', 
	array(
		'default' => 'fadeUp',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_transition_type'
	)
);

$wp_customize->add_control(
	'wp_corporate_header_setting_slider_transition_type', 
	array(
		'type' => 'select',
		'label' => __('Transition Type(Slide/Fade)', 'wp-corporate'),
		'section' => 'wp_corporate_header_setting_slider',
		'choices' => array(
			'fadeOut' => __('Fade', 'wp-corporate'),
			'slideOutLeft' => __('Slide', 'wp-corporate')
		)
	)
);

		$wp_customize->add_setting(
			'wp_corporate_header_setting_slider_transition_speed',
			array(
				'default'       =>      '5000',
				'sanitize_callback' => 'wp_corporate_sanitize_integer'
				)
			);

		$wp_customize->add_control(
			'wp_corporate_header_setting_slider_transition_speed',
			array(
				'type' => 'number',
				'label' => __('Autoplay Speed', 'wp-corporate'),
				'section' => 'wp_corporate_header_setting_slider',
				)
			);

	// Header Search option
$wp_customize->add_section(
	'wp_corporate_header_setting_search',
	array(
		'title' => __('Header Search Setting','wp-corporate'),
		'priority' => '25',
		'panel' => 'wp_corporate_header_setting'
	)
);
$wp_customize->add_setting(
	'wp_corporate_header_setting_search_option',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new WP_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_header_setting_search_option',
		array(
			'type' => 'switch',
			'label' => __('Check to Show Search in Header','wp-corporate'),
			'section' => 'wp_corporate_header_setting_search'
		)
	)
);

		//Search Box Placeholder
$wp_customize->add_setting(
	'wp_corporate_header_setting_search_placeholder', 
	array(
		'default' => __('Search...','wp-corporate'),
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	'wp_corporate_header_setting_search_placeholder',
	array(
		'label' 	=>	__('Enter Search Placeholder','wp-corporate'),
		'type' => 'text',
		'section' => 'wp_corporate_header_setting_search',
		'setting' => 'wp_corporate_header_settings_search_placeholder',
	)
);

		//Search Box Button text
$wp_customize->add_setting(
	'wp_corporate_header_setting_search_text', 
	array(
		'default' => __('Search','wp-corporate'),
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	'wp_corporate_header_setting_search_text',
	array(
		'label' 	=>	__('Enter Search Button text','wp-corporate'),
		'type' => 'text',
		'section' => 'wp_corporate_header_setting_search',
		'setting' => 'wp_corporate_header_settings_search_text',
	)
);

$wp_customize->add_section(
	'wp_corporate_header_setting_callto',
	array(
		'title' => __('Call-To','wp-corporate'),
		'priority' => '10',
		'panel' => 'wp_corporate_header_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_header_setting_callto_text',
	array(
		'default' => '',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_header_setting_callto_text',
	array(
		'type' => 'textarea',
		'label' => __('Call To Content','wp-corporate'),
		'description' => __('Enter text or HTML for call to us','wp-corporate'),
		'section' => 'wp_corporate_header_setting_callto'
	)
);	

$wp_customize->add_section(
	'wp_corporate_header_setting_social', 
	array(
		'priority' => 70,
		'capability' => 'edit_theme_options',
		'title' => __('Header Social Link', 'wp-corporate'),
		'panel' => 'wp_corporate_header_setting',
		'description' => __('Setup Social Setting to show in Header.','wp-corporate'),
	)
);

	    //social setting in header
$wp_customize->add_setting(
	'wp_corporate_header_setting_social_option',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
	)
);

$wp_customize->add_control(
	new Wp_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_header_setting_social_option', 
		array(
			'type' => 'switch',
			'label' => __('Enable Social Icons in Header', 'wp-corporate'),
			'section' => 'wp_corporate_header_setting_social',
			'setting' => 'wp_corporate_header_setting_social_option',		
		)		      	
	)
);

$wp_customize->add_setting(
	'wp_corporate_header_setting_social_text',
	array(
		'default' => __('Stay Connected','wp-corporate'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_header_setting_social_text', 
	array(
		'type' => 'text',
		'label' => __('Enter Text', 'wp-corporate'),
		'section' => 'wp_corporate_header_setting_social',
		'setting' => 'wp_corporate_header_setting_social_option',		
	)  
);

	    //logo Alignment
$wp_customize->add_section(
	'wp_corporate_header_settings_logo', 
	array(
		'priority' => 50,
		'title' => __('Logo Alignment', 'wp-corporate'),
		'panel' => 'wp_corporate_header_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_header_settings_logo_alignment', 
	array(
		'default' => 'left',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_radio_alignment_logo',
	)
);

$wp_customize->add_control(
	'wp_corporate_header_settings_logo_alignment', 
	array(
		'type' => 'radio',
		'label' => __('Choose the layout that you want', 'wp-corporate'),
		'section' => 'wp_corporate_header_settings_logo',
		'setting' => 'wp_corporate_header_settings_logo_alignment',
		'choices' => array(
			'left'=>__('Left', 'wp-corporate'),
			'center'=>__('Center', 'wp-corporate'),
			'right'=>__('Right', 'wp-corporate')
		)
	)
);