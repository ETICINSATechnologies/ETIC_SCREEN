<?php 
$wp_customize->add_panel(
	'wp_corporate_homepage_setting',
	array(
		'priority' => '20',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Homepage Settings', 'wp-corporate' ),
		'description' => __( 'Setup homepage of the site.', 'wp-corporate' ),
	)
);	

$wp_customize->add_section(
	'wp_corporate_homepage_setting_slider',
	array(
		'priority'        => '10',
		'title' => __( 'Slider Section', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'panel' => 'wp_corporate_homepage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_slider_option',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_slider_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Slider', 'wp-corporate'),
			'description' => __('Select Yes to show Slider on Homepage.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_slider',
		)
	)
);

	//Featured sections
$wp_customize->add_section(
	'wp_corporate_homepage_setting_featured',
	array(
		'priority'        => '10',
		'title' => __( 'Featured Section', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'description' => __( 'Setup featured settings for homepage', 'wp-corporate' ),
		'panel' => 'wp_corporate_homepage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_featured_option',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_featured_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Featured Section', 'wp-corporate'),
			'description' => __('Select Yes to show featured section on homepage.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_featured',
		)
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_featured_page_option',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_featured_page_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Featured Page', 'wp-corporate'),
			'description' => __('Select Yes to show featured page on Featured Section.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_featured',
		)
	)
);

		//select page for featured page
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_featured_page',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_featured_page', 
	array(
		'type'	=>	'dropdown-pages',
		'label' => __('Select Page','wp-corporate'),
		'description' => __('Select page to show in featured Page in left side of Featured Section.','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_featured',
		'active_callback' => 'wp_corporate_homepage_setting_featured_page_acb',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_featured_post_option',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_featured_post_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Featured Post', 'wp-corporate'),
			'description' => __('Select Yes to show featured post on Featured Section.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_featured',
		)
	)
);

		//select category for featured posts
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_featured_post',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_featured_post', 
	array(
		'type'	=>	'select',
		'label' => __('Select Category','wp-corporate'),
		'description' => __('Select Featured Post category to show in right side of Featured Section. Three posts are shown in this area.','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_featured',
		'choices' => wp_corporate_category_lists(),
		'active_callback' => 'wp_corporate_homepage_setting_featured_post_acb',
	)
);

	//Counter sections
$wp_customize->add_section(
	'wp_corporate_homepage_setting_counter',
	array(
		'priority'        => '10',
		'title' => __( 'Counter Section', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'description' => __( 'Setup Counter settings for homepage', 'wp-corporate' ),
		'panel' => 'wp_corporate_homepage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_option',
	array(
		'default' => 0,
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_counter_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Counter Section', 'wp-corporate'),
			'description' => __('Select Yes to show counter section on homepage.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_counter',
		)
	)
);

		//Counter Section Title
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_title',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_title', 
	array(
		'type'	=>	'text',
		'label' => __('Section title','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);	

		//Counter Section Sub Title
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_subtitle',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_subtitle', 
	array(
		'type'	=>	'text',
		'label' => __('Section Subtitle','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);	

		//Counter Section Description
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_desc',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_desc', 
	array(
		'type'	=>	'textarea',
		'label' => __('Section Description','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);


		//Counter Section image
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_image',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
	
);

$wp_customize->add_control( 			
	new WP_Customize_Image_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_counter_image', 
		array(
			'label' => __('Upload Image','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_counter',
		)
	)
);

		//Counter one
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_one',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_one', 
	array(
		'type'	=>	'number',
		'label' => __('Counter One','wp-corporate'),	
		'description' => __('Enter Number','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_one_text',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_one_text', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_one_icon',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_one_icon', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Icon','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

		//Counter two
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_two',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_two', 
	array(
		'type'	=>	'number',
		'label' => __('Counter Two','wp-corporate'),
		'description' => __('Enter Number','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_two_text',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_two_text', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_two_icon',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_two_icon', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Icon','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);



		//Counter three
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_three',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_three', 
	array(
		'type'	=>	'number',
		'label' => __('Counter Three','wp-corporate'),
		'description' => __('Enter Number','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_three_text',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_three_text', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_three_icon',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_three_icon', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Icon','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

		//Counter four
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_four',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_four', 
	array(
		'type'	=>	'number',
		'label' => __('Counter Four','wp-corporate'),
		'description' => __('Enter Number','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_four_text',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_four_text', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_four_icon',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_four_icon', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Icon','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

		//Counter five
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_five',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_five', 
	array(
		'type'	=>	'number',
		'label' => __('Counter Five','wp-corporate'),
		'description' => __('Enter Number','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_five_text',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_five_text', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_five_icon',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_five_icon', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Icon','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

		//Counter six
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_six',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_six', 
	array(
		'type'	=>	'number',
		'label' => __('Counter Six','wp-corporate'),
		'description' => __('Enter Number','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_six_text',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_six_text', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_counter_six_icon',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_counter_six_icon', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Icon','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_counter',
	)
);



	//Skill sections
$wp_customize->add_section(
	'wp_corporate_homepage_setting_skill',
	array(
		'priority'        => '10',
		'title' => __( 'Skill Section', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'description' => __( 'Setup Skill settings for homepage', 'wp-corporate' ),
		'panel' => 'wp_corporate_homepage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_option',
	array(
		'default' => 0,
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_skill_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Skill Section', 'wp-corporate'),
			'description' => __('Select Yes to show skill section on homepage.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_skill',
		)
	)
);

		//Skill Section Title
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_title',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_skill_title', 
	array(
		'type'	=>	'text',
		'label' => __('Section title','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_skill',
	)
);	

		//Skill Section Sub Title
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_subtitle',
	array(
		'default' => __('Completion of Projects','wp-corporate'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_skill_subtitle', 
	array(
		'type'	=>	'text',
		'label' => __('Section Subtitle','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_skill',
	)
);	

		//Skill Section Description
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_desc',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_skill_desc', 
	array(
		'type'	=>	'textarea',
		'label' => __('Section Description','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_skill',
	)
);


		//Skill Section image
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_image',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
	
);

$wp_customize->add_control( 			
	new WP_Customize_Image_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_skill_image', 
		array(
			'label' => __('Upload Image','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_skill',
		)
	)
);

		//Skill one
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_one',
	array(
		'default' => '90',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_skill_one', 
	array(
		'type'	=>	'number',
		'label' => __('Skill One','wp-corporate'),	
		'description' => __('Enter Number','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_skill',
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 100,
			'step'  => 1,
		),
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_one_text',
	array(
		'default' => __('HTML','wp-corporate'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_skill_one_text', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_skill',
	)
);

		//Skill two
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_two',
	array(
		'default' => '90',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_skill_two', 
	array(
		'type'	=>	'number',
		'label' => __('Skill Two','wp-corporate'),
		'description' => __('Enter Number','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_skill',
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 100,
			'step'  => 1,
		),
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_two_text',
	array(
		'default' => __('PHP','wp-corporate'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_skill_two_text', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_skill',
	)
);

		//Skill three
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_three',
	array(
		'default' => '90',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer',
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_skill_three', 
	array(
		'type'	=>	'number',
		'label' => __('Skill Three','wp-corporate'),
		'description' => __('Enter Number','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_skill',
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 100,
			'step'  => 1,
		),
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_skill_three_text',
	array(
		'default' => __('Wordpress','wp-corporate'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_skill_three_text', 
	array(
		'type'	=>	'text',
		'description' => __('Enter Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_skill',
	)
);



		//Testimonial sections
$wp_customize->add_section(
	'wp_corporate_homepage_setting_testimonial',
	array(
		'priority'        => '10',
		'title' => __( 'Testimonial Section', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'description' => __( 'Setup Testimonial settings for homepage', 'wp-corporate' ),
		'panel' => 'wp_corporate_homepage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_testimonial_option',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_testimonial_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Testimonial Section', 'wp-corporate'),
			'description' => __('Select Yes to show Testimonial section on homepage.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_testimonial',
		)
	)
);	

		//Testimonial Section Title
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_testimonial_title',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_testimonial_title', 
	array(
		'type'	=>	'text',
		'label' => __('Section title','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_testimonial',
	)
);	

		//Testimonial Section Sub Title
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_testimonial_subtitle',
	array(
		'default' => __('Completion of Projects','wp-corporate'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_testimonial_subtitle', 
	array(
		'type'	=>	'text',
		'label' => __('Section Subtitle','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_testimonial',
	)
);	

		//Testimonial Section Description
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_testimonial_desc',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_testimonial_desc', 
	array(
		'type'	=>	'textarea',
		'label' => __('Section Description','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_testimonial',
	)
);	

		//select category for testimonial 
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_testimonial_category',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_testimonial_category', 
	array(
		'type'	=>	'select',
		'label' => __('Select category','wp-corporate'),
		'description' => __('Select category to show in Testimonial Section.','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_testimonial',
		'choices' => wp_corporate_category_lists(),
	)
);


	//Client sections
$wp_customize->add_section(
	'wp_corporate_homepage_setting_client',
	array(
		'priority'        => '10',
		'title' => __( 'Client Section', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'description' => __( 'Setup Client settings for homepage', 'wp-corporate' ),
		'panel' => 'wp_corporate_homepage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_client_option',
	array(
		'default' => 0,
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_client_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Client Section', 'wp-corporate'),
			'description' => __('Select Yes to show client section on homepage.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_client',
		)
	)
);

		//Client Section Title
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_client_title',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_client_title', 
	array(
		'type'	=>	'text',
		'label' => __('Section title','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_client',
	)
);	

		//Client Section Description
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_client_desc',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_client_desc', 
	array(
		'type'	=>	'textarea',
		'label' => __('Section Description','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_client',
	)
);

		//select category for client 
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_client_category',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_client_category', 
	array(
		'type'	=>	'select',
		'label' => __('Select category','wp-corporate'),
		'description' => __('Select category to show in Client Section.','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_client',
		'choices' => wp_corporate_category_lists(),
	)
);	

		//Client Button link text
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_client_button',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_client_button', 
	array(
		'type'	=>	'text',
		'label' => __('Section Button Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_client',
	)
);

		//CTA Button link 
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_client_button_link',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_client_button_link', 
	array(
		'type'	=>	'text',
		'label' => __('Section Button Link','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_client',
	)
);

	//Blog sections
$wp_customize->add_section(
	'wp_corporate_homepage_setting_blog',
	array(
		'priority'        => '10',
		'title' => __( 'Blog Section', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'description' => __( 'Setup Blog settings for homepage', 'wp-corporate' ),
		'panel' => 'wp_corporate_homepage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_blog_option',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_blog_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Blog Section', 'wp-corporate'),
			'description' => __('Select Yes to show blog section on homepage.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_blog',
		)
	)
);	

		//Blog Section Title
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_blog_title',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_blog_title', 
	array(
		'type'	=>	'text',
		'label' => __('Section title','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_blog',
	)
);
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_blog_subtitle',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_blog_subtitle', 
	array(
		'type'	=>	'text',
		'label' => __('Section Subtitle','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_blog',
	)
);

		//Blog Section Description
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_blog_desc',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_blog_desc', 
	array(
		'type'	=>	'textarea',
		'label' => __('Section Description','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_blog',
	)
);	


		//select category for blog 
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_blog_category',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_blog_category', 
	array(
		'type'	=>	'select',
		'label' => __('Select category','wp-corporate'),
		'description' => __('Select category to show in Blog Section.','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_blog',
		'choices' => wp_corporate_category_lists(),
	)
);

		//CTA sections
$wp_customize->add_section(
	'wp_corporate_homepage_setting_cta',
	array(
		'priority'        => '10',
		'title' => __( 'Call to Action Section', 'wp-corporate' ),
		'capability' => 'edit_theme_options',
		'description' => __( 'Setup Call To Action settings for homepage', 'wp-corporate' ),
		'panel' => 'wp_corporate_homepage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_homepage_setting_cta_option',
	array(
		'default' => '0',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);
$wp_customize->add_control(
	new wp_corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_homepage_setting_cta_option',
		array(
			'type' => 'switch',
			'label' => __('Enable Call To Action Section', 'wp-corporate'),
			'description' => __('Select Yes to show cta section on homepage.','wp-corporate'),
			'section' => 'wp_corporate_homepage_setting_cta',
		)
	)
);	

		//CTA Section Title
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_cta_title',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_cta_title', 
	array(
		'type'	=>	'text',
		'label' => __('Section title','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_cta',
	)
);

		//CTA Section Description
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_cta_desc',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_cta_desc', 
	array(
		'type'	=>	'textarea',
		'label' => __('Section Description','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_cta',
	)
);	

		//CTA Button link text
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_cta_button',
	array(
		'default' => __('Join Today','wp-corporate'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_cta_button', 
	array(
		'type'	=>	'text',
		'label' => __('Section Button Text','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_cta',
	)
);

		//CTA Button link 
$wp_customize->add_setting(
	'wp_corporate_homepage_setting_cta_button_link',
	array(
		'default' => '#',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
		'transport'			=>	'postMessage'
	)
);

$wp_customize->add_control( 
	'wp_corporate_homepage_setting_cta_button_link', 
	array(
		'type'	=>	'text',
		'label' => __('Section Button Link','wp-corporate'),
		'section' => 'wp_corporate_homepage_setting_cta',
	)
);