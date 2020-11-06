<div class="socials-extension__shortcode-wrapper">
	
	<ul class="<?php echo esc_html( $atts['style'] ) ?>">

		<?php
			if( $atts['type_1'] ){
		?>
			<li>
				<a href="<?php echo esc_html( $obj->get_user_social_link( $atts['type_1'], $atts['id_1'] ) )  ?>" target="_blank">
					<i class="<?php echo esc_html( $obj->get_font_awesome_icon($atts['type_1']) ) ?>">
					</i>
					<label><?php echo esc_html( $atts['label_1'] ) ; ?></label>
				</a>
			</li>
		<?php
			} 
		?>

		<?php
			if( $atts['type_2'] ){
		?>
			<li>
				<a href="<?php echo esc_html( $obj->get_user_social_link( $atts['type_2'], $atts['id_2'] ) )  ?>" target="_blank">
					<i class="<?php echo esc_html( $obj->get_font_awesome_icon($atts['type_2']) ) ?>">
					</i>
					<label><?php echo esc_html( $atts['label_2'] ) ; ?></label>
				</a>
			</li>
		<?php
			} 
		?>

	</ul>

</div>