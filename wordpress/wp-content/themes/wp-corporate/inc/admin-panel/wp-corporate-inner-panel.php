<?php
$wp_customize->add_panel(
	'wp_corporate_innerpage_setting',
	array(
		'priority' => '20',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Innerpage Settings', 'wp-corporate' ),
		'description' => __( 'Setup innerpage of the site.', 'wp-corporate' ),
	)
);	

	// Blog Page Setting
$wp_customize->add_section(
	'wp_corporate_innerpage_setting_blog_page',
	array(
		'title'         =>  __('Blog Page Setting','wp-corporate'),
		'capability'	=> 	'edit_theme_options',
		'priority'      =>  10,            
		'panel' 		=> 	'wp_corporate_innerpage_setting',
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_blog_page_slider',
	array(
		'default' =>  '0',
		'sanitize_callback'     =>  'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new Wp_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_innerpage_setting_blog_page_slider',
		array(
			'section'       =>      'wp_corporate_innerpage_setting_blog_page',
			'label'         =>      __('Enable Header Slider', 'wp-corporate'),
			'description'         =>      __('Show Header Slider on Blog Page.', 'wp-corporate'),
			'type'          =>      'switch',
			'output'        =>      array('Yes', 'No')
		)
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_blog_page_layout',
	array(
		'default'=>'right-sidebar',
		'sanitize_callback' => 'wp_corporate_sanitize_radio_sidebar'				
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_blog_page_layout',
	array(
		'type' => 'radio',
		'label' => __('Page Layout', 'wp-corporate'),
		'description' => __('Choose layout for Blog page', 'wp-corporate'),
		'section' => 'wp_corporate_innerpage_setting_blog_page',
		'choices' => array(
			'left-sidebar' =>  __('Left Sidebar','wp-corporate'),
			'right-sidebar' =>  __('Right Sidebar','wp-corporate'),
			'both-sidebar' =>  __('Both Sidebar','wp-corporate'),
			'no-sidebar' =>  __('No Sidebar','wp-corporate'),
		)
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_blog_post_layout',
	array(
		'default'           =>  'large-image',
		'sanitize_callback' =>  'wp_corporate_sanitize_post_layout',
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_blog_post_layout',
	array(
		'priority'      =>  10,  
		'type'          =>  'radio',
		'label' 		=> 	__('Post Layout','wp-corporate'),
		'description'   =>  __('Choose Blog Post Layout','wp-corporate'),
		'section'       =>  'wp_corporate_innerpage_setting_blog_page',
		'choices'        =>  array(
			'large-image' => __('Posts with Large Image', 'wp-corporate'),
			'medium-image' => __('Posts with Medium Image', 'wp-corporate'),
			'alternate-image' => __('Post with Alternate Image', 'wp-corporate'),
		)
	)                   
);

	// Portfolio Page Setting
$wp_customize->add_section(
	'wp_corporate_innerpage_setting_portfolio_page',
	array(
		'title'         =>  __('Portfolio Page Setting','wp-corporate'),
		'capability'	=> 	'edit_theme_options',
		'priority'      =>  10,            
		'panel' 		=> 	'wp_corporate_innerpage_setting',
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_portfolio_page_slider',
	array(
		'default' =>  '0',
		'sanitize_callback'     =>  'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new Wp_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_innerpage_setting_portfolio_page_slider',
		array(
			'section'       =>      'wp_corporate_innerpage_setting_portfolio_page',
			'label'         =>      __('Enable Header Slider', 'wp-corporate'),
			'description'         =>      __('Show Header Slider on Portfolio Page.', 'wp-corporate'),
			'type'          =>      'switch',
		)
	)
);

			//select category for portfolio 
$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_portfolio_page_category',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control( 
	'wp_corporate_innerpage_setting_portfolio_page_category', 
	array(
		'type'	=>	'select',
		'label' => __('Select category.','wp-corporate'),
		'description' => __('Select category to show posts in Portfolio Page Layout.','wp-corporate'),
		'section' => 'wp_corporate_innerpage_setting_portfolio_page',
		'choices' => wp_corporate_category_lists(),
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_portfolio_page_layout',
	array(
		'default'=>'no-sidebar',
		'sanitize_callback' => 'wp_corporate_sanitize_radio_sidebar'				
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_portfolio_page_layout',
	array(
		'type' => 'radio',
		'label' => __('Page Layout', 'wp-corporate'),
		'description' => __('Choose layout for Portfolio page', 'wp-corporate'),
		'section' => 'wp_corporate_innerpage_setting_portfolio_page',
		'choices' => array(
			'left-sidebar' =>  __('Left Sidebar','wp-corporate'),
			'right-sidebar' =>  __('Right Sidebar','wp-corporate'),
			'both-sidebar' =>  __('Both Sidebar','wp-corporate'),
			'no-sidebar' =>  __('No Sidebar','wp-corporate'),
		)
	)
);

	//Single Page
$wp_customize->add_section(
	'wp_corporate_innerpage_setting_single_page',
	array(
		'title' => __('Single Page Settings', 'wp-corporate'),
		'priority' => '70',
		'panel' => 'wp_corporate_innerpage_setting',
		'capability'=> 'edit_theme_options',
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_single_page_slider',
	array(
		'default' =>  '0',
		'sanitize_callback'     =>  'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new Wp_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_innerpage_setting_single_page_slider',array(
			'section'       =>      'wp_corporate_innerpage_setting_single_page',
			'label'         =>      __('Enable Header Slider', 'wp-corporate'),
			'description'         =>      __('Show Header Slider on Single Page.', 'wp-corporate'),
			'type'          =>      'switch',
		)
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_single_page_layout',
	array(
		'default'=>'right-sidebar',
		'sanitize_callback' => 'wp_corporate_sanitize_radio_sidebar'				
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_single_page_layout',
	array(
		'type' => 'radio',
		'label' => __('Single Page Layout', 'wp-corporate'),
		'description' => __('Choose layout for single page landing webpage', 'wp-corporate'),
		'section' => 'wp_corporate_innerpage_setting_single_page',
		'choices' => array(
			'left-sidebar' =>  __('Left Sidebar','wp-corporate'),
			'right-sidebar' =>  __('Right Sidebar','wp-corporate'),
			'both-sidebar' =>  __('Both Sidebar','wp-corporate'),
			'no-sidebar' =>  __('No Sidebar','wp-corporate'),
		)
	)
);

		//Single Post
$wp_customize->add_section(
	'wp_corporate_innerpage_setting_single_post',
	array(
		'title' => __('Single Post Settings', 'wp-corporate'),
		'priority' => '80',
		'panel' => 'wp_corporate_innerpage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_single_post_slider',
	array(
		'default' =>  '0',
		'sanitize_callback'     =>  'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new Wp_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_innerpage_setting_single_post_slider',
		array(
			'section'       =>      'wp_corporate_innerpage_setting_single_post',
			'label'         =>      __('Enable Header Slider', 'wp-corporate'),
			'description'         =>      __('Show Header Slider on Single Post.', 'wp-corporate'),
			'type'          =>      'switch',
			'output'        =>      array('Yes', 'No')
		)
	)
);

		//single post page
$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_single_post_layout',
	array(
		'default' => 'right-sidebar',
		'sanitize_callback' => 'wp_corporate_sanitize_radio_sidebar'
	)
);

$wp_customize->add_control( 
	'wp_corporate_innerpage_setting_single_post_layout',
	array(
		'type' => 'radio',
		'label' => __('Single Post Layout', 'wp-corporate'),
		'description' => __('Choose layout for single post landing webpage', 'wp-corporate'),
		'section' => 'wp_corporate_innerpage_setting_single_post',
		'choices' => array(
			'left-sidebar' =>  __('Left Sidebar','wp-corporate'),
			'right-sidebar' =>  __('Right Sidebar','wp-corporate'),
			'both-sidebar' =>  __('Both Sidebar','wp-corporate'),
			'no-sidebar' =>  __('No Sidebar','wp-corporate'),
		)
	)				
);

	//Archive Pages
$wp_customize->add_section(
	'wp_corporate_innerpage_setting_archive',
	array(
		'title' => __('Archive Pages Settings', 'wp-corporate'),
		'priority' => '60',
		'panel' => 'wp_corporate_innerpage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_archive_slider',
	array(
		'default' =>  '0',
		'sanitize_callback'     =>  'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new Wp_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_innerpage_setting_archive_slider',
		array(
			'section'       =>      'wp_corporate_innerpage_setting_archive',
			'label'         =>      __('Enable Header Slider', 'wp-corporate'),
			'description'         =>      __('Show Header Slider on Archive Page.', 'wp-corporate'),
			'type'          =>      'switch',
			'output'        =>      array('Yes', 'No')
		)
	)
);


		//archive pages layout
$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_archive_layout',
	array(
		'default' => 'right-sidebar',
		'sanitize_callback' => 'wp_corporate_sanitize_radio_sidebar'
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_archive_layout',array(
		'type' => 'radio',
		'label' => __('Archive Page Layout', 'wp-corporate'),
		'description' => __('Choose layout for archive pages landing webpage', 'wp-corporate'),
		'section' => 'wp_corporate_innerpage_setting_archive',
		'choices' => array(
			'left-sidebar' =>  __('Left Sidebar','wp-corporate'),
			'right-sidebar' =>  __('Right Sidebar','wp-corporate'),
			'both-sidebar' =>  __('Both Sidebar','wp-corporate'),
			'no-sidebar' =>  __('No Sidebar','wp-corporate'),
		)

	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_archive_post_layout',
	array(
		'default'           =>  'large-image',
		'sanitize_callback' =>  'wp_corporate_sanitize_post_layout',
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_archive_post_layout',
	array(
		'priority'      =>  10,  
		'type'          =>  'radio',
		'label' 		=> 	__('Post Layout','wp-corporate'),
		'description'   =>  __('Choose Archive Post Layout','wp-corporate'),
		'section'       =>  'wp_corporate_innerpage_setting_archive',
		'choices'        =>  array(
			'large-image' => __('Posts with Large Image', 'wp-corporate'),
			'medium-image' => __('Posts with Medium Image', 'wp-corporate'),
			'alternate-image' => __('Post with Alternate Image', 'wp-corporate'),
		)
	)                   
);

	//Team Page
$wp_customize->add_section(
	'wp_corporate_innerpage_setting_team',
	array(
		'title' => __('Team Page Settings', 'wp-corporate'),
		'priority' => '40',
		'panel' => 'wp_corporate_innerpage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_team_slider',
	array(
		'default' =>  '0',
		'sanitize_callback'     =>  'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new Wp_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_innerpage_setting_team_slider',
		array(
			'section'       =>      'wp_corporate_innerpage_setting_team',
			'label'         =>      __('Enable Header Slider', 'wp-corporate'),
			'description'         =>      __('Show Header Slider on Team Page.', 'wp-corporate'),
			'type'          =>      'switch',
			'output'        =>      array('Yes', 'No')
		)
	)
);

		//select category for team 
$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_team_category',
	array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control( 
	'wp_corporate_innerpage_setting_team_category', 
	array(
		'type'	=>	'select',
		'label' => __('Select category.','wp-corporate'),
		'description' => __('Select category to show posts in Team Page Layout.','wp-corporate'),
		'section' => 'wp_corporate_innerpage_setting_team',
		'choices' => wp_corporate_category_lists(),
	)
);

		//team page layout
$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_team_layout',
	array(
		'default' => 'right-sidebar',
		'sanitize_callback' => 'wp_corporate_sanitize_radio_sidebar'
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_team_layout',
	array(
		'type' => 'radio',
		'label' => __('Team Page Layout', 'wp-corporate'),
		'description' => __('Choose layout for team pages landing webpage', 'wp-corporate'),
		'section' => 'wp_corporate_innerpage_setting_team',
		'choices' => array(
			'left-sidebar' =>  __('Left Sidebar','wp-corporate'),
			'right-sidebar' =>  __('Right Sidebar','wp-corporate'),
			'both-sidebar' =>  __('Both Sidebar','wp-corporate'),
			'no-sidebar' =>  __('No Sidebar','wp-corporate'),
		)

	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_team_post_layout',
	array(
		'default'           =>  'list',
		'sanitize_callback' =>  'wp_corporate_sanitize_list_grid',
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_team_post_layout',
	array(
		'priority'      =>  10,  
		'type'          =>  'radio',
		'label' 		=> 	__('Post Layout','wp-corporate'),
		'description'   =>  __('Choose Team Post Layout','wp-corporate'),
		'section'       =>  'wp_corporate_innerpage_setting_team',
		'choices'        =>  array(
			'list' => __('List View', 'wp-corporate'),
			'grid' => __('Grid View', 'wp-corporate'),                  	
		)
	)                   
);

	//Testimonial Page
$wp_customize->add_section(
	'wp_corporate_innerpage_setting_testimonial',
	array(
		'title' => __('Testimonial Page Settings', 'wp-corporate'),
		'priority' => '50',
		'panel' => 'wp_corporate_innerpage_setting'
	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_testimonial_slider',
	array(
		'default' =>  '0',
		'sanitize_callback'     =>  'wp_corporate_sanitize_integer'
	)
);

$wp_customize->add_control(
	new Wp_Corporate_WP_Customize_Switch_Control(
		$wp_customize,
		'wp_corporate_innerpage_setting_testimonial_slider',
		array(
			'section'       =>      'wp_corporate_innerpage_setting_testimonial',
			'label'         =>      __('Enable Header Slider', 'wp-corporate'),
			'description'         =>      __('Show Header Slider on Testimonial Page.', 'wp-corporate'),
			'type'          =>      'switch',
			'output'        =>      array('Yes', 'No')
		)
	)
);


		//testimonial pages layout
$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_testimonial_layout',
	array(
		'default' => 'right-sidebar',
		'sanitize_callback' => 'wp_corporate_sanitize_radio_sidebar'
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_testimonial_layout',
	array(
		'type' => 'radio',
		'label' => __('Testimonial Page Layout', 'wp-corporate'),
		'description' => __('Choose layout for testimonial pages landing webpage', 'wp-corporate'),
		'section' => 'wp_corporate_innerpage_setting_testimonial',
		'choices' => array(
			'left-sidebar' =>  __('Left Sidebar','wp-corporate'),
			'right-sidebar' =>  __('Right Sidebar','wp-corporate'),
			'both-sidebar' =>  __('Both Sidebar','wp-corporate'),
			'no-sidebar' =>  __('No Sidebar','wp-corporate'),
		)

	)
);

$wp_customize->add_setting(
	'wp_corporate_innerpage_setting_testimonial_post_layout',
	array(
		'default'           =>  'list',
		'sanitize_callback' =>  'wp_corporate_sanitize_list_grid',
	)
);

$wp_customize->add_control(
	'wp_corporate_innerpage_setting_testimonial_post_layout',
	array(
		'priority'      =>  10,  
		'type'          =>  'radio',
		'label' 		=> 	__('Post Layout','wp-corporate'),
		'description'   =>  __('Choose Testimonial Post Layout','wp-corporate'),
		'section'       =>  'wp_corporate_innerpage_setting_testimonial',
		'choices'        =>  array(
			'list' => __('List View', 'wp-corporate'),
			'grid' => __('Grid View', 'wp-corporate'),                  	
		)
	)                   
);