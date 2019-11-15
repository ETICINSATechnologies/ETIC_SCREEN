<?php
if(class_exists('WP_Customize_Control')):
    class WP_Corporate_Section_ReOrder extends WP_Customize_Control {
        public $type = 'dragndrop';
        /**
        * Render the content of the category dropdown
        *
        * @return HTML
        */
        public function render_content() {
            if ( empty( $this->choices ) ){
                return;
            }
            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <ul class="controls" id ="ed-sections-reorder">
            <?php
            $default_short_array = array();
            foreach ( $this->choices as $value => $label ) {
                $default_short_array[$value] = $label;
            }
            $order_save_value = get_theme_mod( $this->id );
            ?>
            <?php
            if( !empty( $order_save_value ) ) {
                $order_save_array = explode( ',' , $order_save_value);
                $order_save_array_pop = array_pop( $order_save_array );
                foreach ($order_save_array as $key => $value) {
                ?>
                
                <li class="ed-section-element" data-section-name="<?php echo esc_attr( $value );?>" id="<?php echo esc_attr( $value ); ?>"><i class="fa fa-arrows-v"></i><?php echo esc_attr( $default_short_array[$value] ); ?></li>
                <?php      
                }
                $section_order_list = $order_save_value;
            
            } else {
            $order_array = array();
            foreach ( $this->choices as $value => $label ) {
            $order_array[] = $value;            
            ?>
            <li class="ed-section-element" data-section-name="<?php echo esc_attr( $value );?>" id="<?php echo esc_attr( $value ); ?>"><i class="fa fa-arrows-v"></i><?php echo esc_attr( $label ); ?></li>
            <?php
            }
            $section_order_list = implode ( "," , $order_array );
            }
            ?>
            <input id="shortui-order" type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr($section_order_list); ?>" />  
            </ul>        
            <?php
        }
    }
endif;