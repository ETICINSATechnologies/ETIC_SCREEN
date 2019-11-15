<?php
	//social Settings section
$wp_customize->add_section(
	'wp_corporate_social_setting_section', 
	array(
		'priority' => 70,
		'capability' => 'edit_theme_options',
		'title' => __('Social Link Setup', 'wp-corporate'),
		'description' => __('Add your link of the respective site.','wp-corporate'),
	)
);	

	   //social facebook link
$wp_customize->add_setting(
	'wp_corporate_social_facebook', 
	array(
		'default' => '#',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_social_facebook',
	array(
		'type' => 'text',
		'label' => __('Facebook','wp-corporate'),
		'section' => 'wp_corporate_social_setting_section',
		'setting' => 'wp_corporate_social_facebook'
	)
);

	    //social twitter link
$wp_customize->add_setting(
	'wp_corporate_social_twitter', 
	array(
		'default' => '#',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_social_twitter',
	array(
		'type' => 'text',
		'label' => __('Twitter','wp-corporate'),
		'section' => 'wp_corporate_social_setting_section',
		'setting' => 'wp_corporate_social_twitter'
	)
);

	    //social googleplus link
$wp_customize->add_setting(
	'wp_corporate_social_googleplus', 
	array(
		'default' => '#',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_social_googleplus',
	array(
		'type' => 'text',
		'label' => __('Google Plus','wp-corporate'),
		'section' => 'wp_corporate_social_setting_section',
		'setting' => 'wp_corporate_social_googleplus'
	)
);

	     //social youtube link
$wp_customize->add_setting(
	'wp_corporate_social_youtube', 
	array(
		'default' => '#',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_social_youtube',
	array(
		'type' => 'text',
		'label' => __('YouTube','wp-corporate'),
		'section' => 'wp_corporate_social_setting_section',
		'setting' => 'wp_corporate_social_youtube'
	)
);

	     //social pinterest link
$wp_customize->add_setting(
	'wp_corporate_social_pinterest', 
	array(
		'default' => '',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_social_pinterest',
	array(
		'type' => 'text',
		'label' => __('Pinterest','wp-corporate'),
		'section' => 'wp_corporate_social_setting_section',
		'setting' => 'wp_corporate_social_pinterest'
	)
);

	    //social linkedin link
$wp_customize->add_setting(
	'wp_corporate_social_linkedin', 
	array(
		'default' => '',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_social_linkedin',
	array(
		'type' => 'text',
		'label' => __('Linkedin','wp-corporate'),
		'section' => 'wp_corporate_social_setting_section',
		'setting' => 'wp_corporate_social_linkedin'
	)
);


	    //social vimeo link
$wp_customize->add_setting(
	'wp_corporate_social_vimeo', 
	array(
		'default' => '',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_social_vimeo',
	array(
		'type' => 'text',
		'label' => __('Vimeo','wp-corporate'),
		'section' => 'wp_corporate_social_setting_section',
		'setting' => 'wp_corporate_social_vimeo'
	)
);

	    //social instagram link
$wp_customize->add_setting(
	'wp_corporate_social_instagram', 
	array(
		'default' => '',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_social_instagram',
	array(
		'type' => 'text',
		'label' => __('Instagram','wp-corporate'),
		'section' => 'wp_corporate_social_setting_section',
		'setting' => 'wp_corporate_social_instagram'
	)
);

	    //social skype link
$wp_customize->add_setting(
	'wp_corporate_social_skype', 
	array(
		'default' => '',
		'sanitize_callback' => 'wp_corporate_sanitize_text',
	)
);

$wp_customize->add_control(
	'wp_corporate_social_skype',
	array(
		'type' => 'text',
		'label' => __('Skype','wp-corporate'),
		'section' => 'wp_corporate_social_setting_section',
		'setting' => 'wp_corporate_social_skype'
	)
);