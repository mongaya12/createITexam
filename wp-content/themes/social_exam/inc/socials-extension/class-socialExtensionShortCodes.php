<?php 

/**
* Social Extension 
*
**/

Class socialExtensionShortCodes extends shortCodeExtension {


	public function __construct() {

		$this->init();
	
	}

	public function init() {

		$this->register_shortcodes();
		$this->register_customizes();
		$this->enqueue_scripts_styles();

	}

	public function register_customizes() {

		add_action( 'customize_register', array( $this, 'wp_customize_panel_ct_socials' ) );

	}

	public function register_shortcodes() {

		add_shortcode( 'ct_socials', array( $this, 'ct_socials_shortcodes' ) );
		add_shortcode( 'ct_facebook', array( $this, 'ct_social_facebook_feeds' ) );
		add_shortcode( 'ct_twitter', array( $this, 'ct_social_twitter_feeds' ) );


	}

	public function enqueue_scripts_styles() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

	}

	public function enqueue_styles() {

		wp_enqueue_style( 'ctm-fontawesome-icons' , 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css',  array(), false );

		wp_enqueue_style( 'socials-extension-styles', get_template_directory_uri() . '/inc/socials-extension/assets/css/socials-extension.css', array(), false );

	}
	

	public function ct_socials_shortcodes( $atts ) {

		if( ! empty( $atts ) )
			$atts = filter_var_array( $atts, FILTER_SANITIZE_STRING );

		extract( shortcode_atts ( array(

			'style'		=> '',
			'type_1'	=> '',
			'label_1'	=> '',
			'id_1'		=> '',
			'type_2'	=> '',
			'label_2'	=> '',
			'id_2'		=> '',

		), $atts ) );


		if( empty( $atts ) ) { 

			$temp_atts = array(

				'style'		=> 'horizontal small',
				'type_1'	=> 'facebook',
				'label_1'	=> 'Facebook',
				'id_1'		=> '',
				'type_2'	=> 'twitter',
				'label_2'	=> 'Check out twitter',
				'id_2'		=> '',

			);

			$content = $this->ct_social_links_templates( $temp_atts );

		} else {

			$content = $this->ct_social_links_templates( $atts );	

		} 

		return $content;

	}

	/**
	* Facebook feeds, Facebook has limited attributes to consider for page plugins. 
	**/

	public function ct_social_facebook_feeds( $atts ) {

		if( !empty( $atts ) )
			$atts = filter_var_array( $atts, FILTER_SANITIZE_STRING );

		$fb_data = array( 

			'page_name'	=> get_theme_mod( 'ct_social_text_block_for_fb_page' ),
			'api_key'	=> get_theme_mod( 'ct_social_text_block_for_fb_api' )
		
		);

		extract( shortcode_atts ( array(

			'style'				=> 'light',
			'width'				=> '300',
			'height'			=> '400',
			'tabs'				=> 'timeline',
			'small_header'		=> 'true',
			'adapt_container'	=> 'true'

		), $atts ) );

		$atts_shortcode = array(
			'style'				=> $style,
			'width'				=> $width,
			'height'			=> $height,
			'tabs'				=> $tabs,
			'small_header'		=> $small_header,
			'adapt_container'	=> $adapt_container
		);

		$content = $this->ct_social_facebook_html( $atts_shortcode, $fb_data );			

		return $content;

	}

	public function ct_social_twitter_feeds( $atts ) {

		if( !empty( $atts ) )
			$atts = filter_var_array( $atts, FILTER_SANITIZE_STRING );

		$twitter_name = get_theme_mod( 'ct_social_text_block_for_twitter' );

		extract( shortcode_atts ( array(

			'theme'				=> 'light',
			'width'				=> '300',
			'height'			=> '500',

		), $atts ) );

		$atts_shortcode = array(
			'theme'				=> $theme,
			'width'				=> $width,
			'height'			=> $height,
		);		

		$content = $this->ct_socials_twitter_html( $atts_shortcode, $twitter_name );

		return $content;

	}

	public function ct_socials_twitter_html( $atts, $screen_name ) {

		ob_start();

		include_once get_template_directory() . '/inc/socials-extension/views/html-ct-twitter.php';

		$content = ob_get_clean();

		return $content;

	}

	public function ct_social_facebook_html( $atts, $fb_data ) {

		ob_start();

		include_once get_template_directory() . '/inc/socials-extension/views/html-ct-facebook.php';

		$content = ob_get_clean();

		return $content;

	}

	public function ct_social_links_templates( $atts ) {
		
		ob_start();

		$obj = new socialExtensionShortCodes();

		include_once get_template_directory() . '/inc/socials-extension/views/html-ct-socials.php';

		$content = ob_get_clean();

		return $content;

	}

	public function wp_customize_panel_ct_socials( $wp_customize ) {

		$wp_customize->add_panel( 'ct_socials_panel', array(
			'priority'       => 500,
			'theme_supports' => '',
			'title'          => __( 'CT Socials', 'ct_socials' ),
			'description'    => __( 'Set userid for certain social.', 'ct_socials' ),
		) );

		$wp_customize->add_section( 'ct_social_section_for_fb' , array(
			'title'    => __('Facebook Settings','ct_socials'),
			'panel'    => 'ct_socials_panel',
			'priority' => 10,
			'description'	=> __('shortcode: [ct_facebook] available attributes: style,width,height,tabs,small_header,adapt_container','ct_socials')
		) );

		$wp_customize->add_setting( 'ct_social_text_block_for_fb_page', array(
			 'default'           => __( '', 'ct_socials' ),
			 'sanitize_callback' => array( $this, 'sanitize_input_text')
		) );

		$wp_customize->add_control( new WP_Customize_Control(
		    $wp_customize,
			'ct_social_section_for_fb_page',
			    array(
			        'label'    		=> __( 'Facebook Page', 'ct_socials' ),
			        'section'  		=> 'ct_social_section_for_fb',
			        'settings' 		=> 'ct_social_text_block_for_fb_page',
			        'type'     		=> 'text',
			        'description' 	=> __( 'Your Page Name', 'ct_socials' )
			    )
		    )
		);

		$wp_customize->add_setting( 'ct_social_text_block_for_fb_api', array(
			 'default'           => __( '', 'ct_socials' ),
			 'sanitize_callback' => array( $this, 'sanitize_input_text')
		) );

		$wp_customize->add_control( new WP_Customize_Control(
		    $wp_customize,
			'ct_social_section_for_fb_api',
			    array(
			        'label'    		=> __( 'Facebook API Key', 'ct_socials' ),
			        'section'  		=> 'ct_social_section_for_fb',
			        'settings' 		=> 'ct_social_text_block_for_fb_api',
			        'type'     		=> 'text',
			        'description' 	=> __( 'Your API Key', 'ct_socials' )
			    )
		    )
		);


		$wp_customize->add_section( 'ct_social_section_for_twitter' , array(
			'title'    => __('Twitter Settings','ct_socials'),
			'panel'    => 'ct_socials_panel',
			'priority' => 10,
			'description'	=> __('shortcode: [ct_twitter] available attributes: theme,width,height','ct_socials')
		) );

		$wp_customize->add_setting( 'ct_social_text_block_for_twitter', array(
			 'default'           => __( '', 'ct_socials' ),
			 'sanitize_callback' => array( $this, 'sanitize_input_text')
		) );

		$wp_customize->add_control( new WP_Customize_Control(
		    $wp_customize,
			'ct_social_section_for_twitter',
			    array(
			        'label'    => __( 'Twitter Name', 'ct_socials' ),
			        'section'  => 'ct_social_section_for_twitter',
			        'settings' => 'ct_social_text_block_for_twitter',
			        'type'     => 'text',
			        'description' => __('Your @twitter name','ct_socials')
			    )
		    )
		);

	}

	public function sanitize_input_text( $text ) {

		return sanitize_text_field( $text );
	
	}

}