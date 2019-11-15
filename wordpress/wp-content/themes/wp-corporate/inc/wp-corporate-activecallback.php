<?php 

function wp_corporate_homepage_setting_featured_page_acb( $control ) {
    $choose = get_theme_mod('wp_corporate_homepage_setting_featured_page_option',0);
    if($choose == 1 ){
        return true;
    }else{
        return false;
    }
}   

function wp_corporate_homepage_setting_featured_post_acb( $control ) {
    $choose = get_theme_mod('wp_corporate_homepage_setting_featured_post_option',0);
    if($choose == 1 ){
        return true;
    }else{
        return false;
    }
}