<?php
//add new custom control type switch
if(class_exists( 'WP_Customize_control')):
	class Wp_Corporate_WP_Customize_Switch_Control extends WP_Customize_Control {
		public $type = 'switch';
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="switch_options">
					<span class="switch_enable"><?php esc_html_e('Yes','wp-corporate'); ?></span>
					<span class="switch_disable"><?php esc_html_e('No','wp-corporate'); ?></span>  
					<input type="hidden" id="switch_yes_no" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>" />
				</div>
			</label>
			<?php
		}
	}
	endif;