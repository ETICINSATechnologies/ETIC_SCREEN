/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

//counter section
	wp.customize( 'wp_corporate_homepage_setting_counter_title', function( value ) {
		value.bind( function( to ) {
			$( 'h2.counter-title.section-title' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_subtitle', function( value ) {
		value.bind( function( to ) {
			$( 'h4.counter-subtitle.section-subtitle' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p.counter-desc.section-desc' ).text( to );
		} );
	} );

	//counter one
	wp.customize( 'wp_corporate_homepage_setting_counter_one', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-one .counter' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_one_text', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-one .counter-text' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_one_icon', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-one' ).find( 'i' ).attr('class', 'fa ' + to );
		} );
	} );

	//counter two
	wp.customize( 'wp_corporate_homepage_setting_counter_two', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-two .counter' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_two_text', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-two .counter-text' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_two_icon', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-two' ).find( 'i' ).attr('class', 'fa ' + to );
		} );
	} );

	//counter three
	wp.customize( 'wp_corporate_homepage_setting_counter_three', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-three .counter' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_three_text', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-three .counter-text' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_three_icon', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-three' ).find( 'i' ).attr('class', 'fa ' + to );
		} );
	} );

	//counter four
	wp.customize( 'wp_corporate_homepage_setting_counter_four', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-four .counter' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_four_text', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-four .counter-text' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_four_icon', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-four' ).find( 'i' ).attr('class', 'fa ' + to );
		} );
	} );

	//counter five
	wp.customize( 'wp_corporate_homepage_setting_counter_five', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-five .counter' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_five_text', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-five .counter-text' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_five_icon', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-five' ).find( 'i' ).attr('class', 'fa ' + to );
		} );
	} );

	//counter six
	wp.customize( 'wp_corporate_homepage_setting_counter_six', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-six .counter' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_six_text', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-six .counter-text' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_counter_six_icon', function( value ) {
		value.bind( function( to ) {
			$( '.counter-icon-wrap.counter-six' ).find( 'i' ).attr('class', 'fa ' + to );
		} );
	} );


//skill section
	wp.customize( 'wp_corporate_homepage_setting_skill_title', function( value ) {
		value.bind( function( to ) {
			$( 'h2.skill-title.section-title' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_skill_subtitle', function( value ) {
		value.bind( function( to ) {
			$( 'h4.skill-subtitle.section-subtitle' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_skill_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p.skill-desc.section-desc' ).text( to );
		} );
	} );

	//skill one
	wp.customize( 'wp_corporate_homepage_setting_skill_one_text', function( value ) {
		value.bind( function( to ) {
			$( '.skill-bar-wrap.skill-one .skill-text' ).text( to );
		} );
	} );

	//skill two
	wp.customize( 'wp_corporate_homepage_setting_skill_two_text', function( value ) {
		value.bind( function( to ) {
			$( '.skill-bar-wrap.skill-two .skill-text' ).text( to );
		} );
	} );

	//skill three
	wp.customize( 'wp_corporate_homepage_setting_skill_three_text', function( value ) {
		value.bind( function( to ) {
			$( '.skill-bar-wrap.skill-three .skill-text' ).text( to );
		} );
	} );

//client section
	wp.customize( 'wp_corporate_homepage_setting_client_title', function( value ) {
		value.bind( function( to ) {
			$( 'h2.client-title.section-title' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_client_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p.client-desc.section-desc' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_client_button', function( value ) {
		value.bind( function( to ) {
			$( 'a.client-button.section-button' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_client_button_link', function( value ) {
		value.bind( function( to ) {
			$( 'a.client-button.section-button' ).attr( 'href', to );
		} );
	} );

// Testimonial Section
	wp.customize( 'wp_corporate_homepage_setting_testimonial_title', function( value ) {
		value.bind( function( to ) {
			$( 'h2.testimonial-title.section-title' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_testimonial_subtitle', function( value ) {
		value.bind( function( to ) {
			$( 'h4.testimonial-subtitle.section-subtitle' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_testimonial_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p.testimonial-desc.section-desc' ).text( to );
		} );
	} );

//Blog Section
	wp.customize( 'wp_corporate_homepage_setting_blog_title', function( value ) {
		value.bind( function( to ) {
			$( 'h2.blog-title.section-title' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_blog_subtitle', function( value ) {
		value.bind( function( to ) {
			$( 'h4.blog-subtitle.section-subtitle' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_blog_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p.blog-desc.section-desc' ).text( to );
		} );
	} );

//Call to action Section
	wp.customize( 'wp_corporate_homepage_setting_cta_title', function( value ) {
		value.bind( function( to ) {
			$( 'h2.cta-title.section-title' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_cta_desc', function( value ) {
		value.bind( function( to ) {
			$( 'p.cta-desc.section-desc' ).text( to );
		} );
	} );

	wp.customize( 'wp_corporate_homepage_setting_cta_button', function( value ) {
		value.bind( function( to ) {
			$( 'a.cta-button.section-button' ).text( to );
		} );
	} );

// Search 
	wp.customize( 'wp_corporate_header_setting_search_placeholder', function( value ) {
		value.bind( function( to ) {
			$( '.search-form .search-field' ).attr('placeholder', to );
		} );
	} );
	wp.customize( 'wp_corporate_header_setting_search_text', function( value ) {
		value.bind( function( to ) {
			$( '.search-form .search-submit' ).attr('value', to );
		} );
	} );
} )( jQuery );
