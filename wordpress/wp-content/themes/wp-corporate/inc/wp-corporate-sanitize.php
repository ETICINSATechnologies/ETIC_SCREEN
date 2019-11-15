<?php
function wp_corporate_sanitize_text( $input ) {
  return wp_kses_post( force_balance_tags( $input ) );
}
function wp_corporate_sanitize_radio_webpagelayout($input) {
  $valid_keys = array(
    'fullwidth' => __('Full Width', 'wp-corporate'),
    'boxed' => __('Boxed Layout', 'wp-corporate'),
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
    return $input;
  } else {
    return '';
  }
}

function wp_corporate_sanitize_transition_type($input) {
  $valid_keys = array(
      'fadeOut' => __('Fade', 'wp-corporate'),
      'slideOutLeft' => __('Slide', 'wp-corporate')
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}

function wp_corporate_sanitize_radio_alignment_logo($input) {
  $valid_keys = array(
    'left'=>__('Logo and Menu at Left with ads', 'wp-corporate'),
    'center'=>__('Logo and Menu at Center', 'wp-corporate'),
    'right'=>__('Logo and Menu at Right with ads', 'wp-corporate')
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}


function wp_corporate_sanitize_radio_sidebar($input) {
  $valid_keys = array(
    'left-sidebar' =>  __('Left Sidebar','wp-corporate'),
    'right-sidebar' =>  __('Right Sidebar','wp-corporate'),
    'both-sidebar' =>  __('Both Sidebar','wp-corporate'),
    'no-sidebar' =>  __('No Sidebar','wp-corporate'),
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
   return $input;
 } else {
   return '';
 }
}

   //integer sanitize
function wp_corporate_sanitize_integer($input){
  return intval( $input );
}

function wp_corporate_sanitize_post_layout($input){
  $layout = array(
    'large-image' => __('Posts with Large Image', 'wp-corporate'),
    'medium-image' => __('Posts with Medium Image', 'wp-corporate'),
    'alternate-image' => __('Post with Alternate Image', 'wp-corporate'),
  );

  if(array_key_exists($input,$layout)){
    return $input;
  }else{
    return '';
  }
}

function wp_corporate_sanitize_list_grid($input){
  $layout = array(
    'list' => __('List View', 'wp-corporate'),
    'grid' => __('Grid View', 'wp-corporate'),                    
  );

  if(array_key_exists($input,$layout)){
    return $input;
  }else{
    return '';
  }
}