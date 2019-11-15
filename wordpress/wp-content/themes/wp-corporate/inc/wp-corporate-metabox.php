<?php
    add_action('add_meta_boxes', 'wp_corporate_add_sidebar_layout_box');
    function wp_corporate_add_sidebar_layout_box(){
        
        add_meta_box(
                     'wp_corporate_sidebar_layout', // $id
                     __('Sidebar Layout','wp-corporate'), // $title
                     'wp_corporate_sidebar_layout_callback', // $callback
                     'page', // $page
                     'normal', // $context
                     'high'); // $priority
        add_meta_box(
                     'wp_corporate_sidebar_layout', // $id
                     __('Sidebar Layout','wp-corporate'), // $title
                     'wp_corporate_sidebar_layout_callback', // $callback
                     'post', // $page
                     'normal', // $context
                     'high'); // $priority

    }

    $wp_corporate_sidebar_layout = array(
        'left-sidebar' => array(
                        'value'     => 'left-sidebar',
                        'label'     => __( 'Left sidebar', 'wp-corporate' ),
                        'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
                ), 
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'wp-corporate' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'both-sidebar' => array(
                        'value'     => 'both-sidebar',
                        'label'     => __( 'Both Sidebar', 'wp-corporate' ),
                        'thumbnail' => get_template_directory_uri() . '/images/both-sidebar.png'
                    ),
       
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'wp-corporate' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    )   

        );
    

    function wp_corporate_sidebar_layout_callback(){ 
        global $post , $wp_corporate_sidebar_layout;
        wp_nonce_field( basename( __FILE__ ), 'wp_corporate_sidebar_layout_nonce' ); 
        ?>

        <table class="form-table">
        <tr>
        <td colspan="4"><em class="f13">Choose Sidebar Template</em></td>
        </tr>

        <tr>
        <td>
        <?php  
            foreach ($wp_corporate_sidebar_layout as $field) {  
            $wp_corporate_sidebar_metalayout = get_post_meta( $post->ID, 'wp_corporate_sidebar_layout', true ); ?>
                <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                <label class="description">
                <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                <input type="radio" name="wp_corporate_sidebar_layout" value="<?php echo esc_attr($field['value']); ?>" <?php checked( $field['value'], $wp_corporate_sidebar_metalayout ); if(empty($wp_corporate_sidebar_metalayout) && $field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html($field['label']); ?>
                </label>
                </div>
            <?php } // end foreach 
            ?>
            <div class="clear"></div>
        </td>
        </tr>
        </table>

    <?php } 

    /**
     * save the custom metabox data
     * @hooked to save_post hook
     */
    function wp_corporate_save_sidebar_layout( $post_id ){ 
        global $wp_corporate_sidebar_layout, $post; 

        // Verify the nonce before proceeding.
        if ( !isset( $_POST[ 'wp_corporate_sidebar_layout_nonce' ] ) || !wp_verify_nonce( wp_unslash($_POST[ 'wp_corporate_sidebar_layout_nonce' ]), basename( __FILE__ ) ) )
            return;

        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;
            
        if ('page' == wp_unslash($_POST['post_type'])) {  
            if (!current_user_can( 'edit_page', $post_id ) )  
                return $post_id;  
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;  
        }  
        

        foreach ($wp_corporate_sidebar_layout as $field) {  
            //Execute this saving function
            $old = get_post_meta( $post_id, 'wp_corporate_sidebar_layout', true); 
            $new = sanitize_text_field(wp_unslash($_POST['wp_corporate_sidebar_layout']));
            if ($new && $new != $old) {  
                update_post_meta($post_id, 'wp_corporate_sidebar_layout', $new);  
            } elseif ('' == $new && $old) {  
                delete_post_meta($post_id,'wp_corporate_sidebar_layout', $old);  
            } 
         } // end foreach   
         
    }
    add_action('save_post', 'wp_corporate_save_sidebar_layout');