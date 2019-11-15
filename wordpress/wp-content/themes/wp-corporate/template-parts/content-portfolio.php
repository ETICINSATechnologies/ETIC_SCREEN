<?php 
$port_cat = get_theme_mod('wp_corporate_innerpage_setting_portfolio_page_category');
$args= array(
	'cat'	=>	$port_cat,
	'post_per_page'	=>	-1,
	'post_status'	=>	'publish'
	);
$port_query = new WP_Query($args);
$all_cat = get_categories(array('type' => 'post', 'parent' => $port_cat));
if($port_query->have_posts()){
?>
	<div class="portfolio-wrap">
        <header class="sortable-header"> 
            <ul class='button-group filters-button-group'>
                <li class="button is-checked" data-filter="*"> <?php esc_html_e('All', 'wp-corporate');?> </li>
                <?php
                foreach ($all_cat as $category) :
                    $cat_detail = get_category($category);
                    echo '<li class="button" data-filter=.' . esc_attr($cat_detail->slug) . '>' . esc_html($cat_detail->name) . '</li>';
                endforeach;
                ?>
                </ul>
                <?php
            wp_reset_postdata();
            ?>
        </header>

        <div class="ed-sortable-grid">
        <?php                            
            if ($port_query->have_posts()): 
                while ($port_query->have_posts()) : 
                    $port_query->the_post();
                    $term_lists = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
                    $term_slugs = array();
                    foreach ($term_lists as $term_list) {
                        $term_slugs[] = $term_list->slug;
                    }
                    $term_slugs = join(' ', $term_slugs);
                    ?>              
                                
                    <div class="element-item <?php echo esc_attr($term_slugs);?>">
                        <?php
                        if(has_post_thumbnail()):
                            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'wp-corporate-portfolio-image', true);
                            $img_link = $img_src[0];
                            ?>
                            <div class="ed-grid-img">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo esc_url($img_link); ?>" alt="<?php the_title_attribute(); ?>">
                                </a>
                            </div>

                            <div class="ed-grid-hover">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p><?php $excerpt = get_the_excerpt();
                                    echo wp_trim_words($excerpt, 10);
                                ?></p>
                            </div>
                        <?php
                        endif;?>
                    </div>
                    <?php
                endwhile;
            endif;
        ?>
        </div>
    </div>
        
<?php
}
?>