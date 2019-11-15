<?php
/**
  *
 * @package WP_Corporate
 */
$search_placeholder  = get_theme_mod('wp_corporate_header_setting_search_placeholder',__('Search...','wp-corporate'));
$search_button_text  = get_theme_mod('wp_corporate_header_setting_search_text',__('Search','wp-corporate'));
 ?>
<div class="search-icon">
    <i class="fa fa-search"></i>
    <div class="ed-search">
    <div class="search-close"><i class="fa fa-close"></i></div>
     <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">
        <label>
            <span class="screen-reader-text"><?php esc_html_e('Search for:','wp-corporate');?></span>
            <input type="search" title="<?php esc_html_e('Search for:','wp-corporate');?>" name="s" value="" placeholder="<?php echo esc_attr($search_placeholder); ?>" class="search-field" />
        </label>
        <input type="submit" value="<?php echo esc_attr($search_button_text); ?>" class="search-submit" />
     </form> 
    </div>
</div> 