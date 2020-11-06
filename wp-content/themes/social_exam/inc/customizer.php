<?php
/**
 * social_exam Theme Customizer
 *
 * @package social_exam
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function social_exam_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'social_exam_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'social_exam_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'social_exam_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function social_exam_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function social_exam_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function social_exam_customize_preview_js() {
	wp_enqueue_script( 'social_exam-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'social_exam_customize_preview_js' );

// 379955729868797

/* PHP SDK v5.0.0 */
/* make the API call */
// require_once get_template_directory() . '/inc/socials-extension/inc/facebook/autoload.php';

// $fb = new \Facebook\Facebook([
//   'app_id' => '379955729868797',           //Replace {your-app-id} with your app ID
//   'app_secret' => '21deb2c6e18aa201bdc3b5ee163d134f',   //Replace {your-app-secret} with your app secret
//   'graph_api_version' => 'v5.0',
// ]);

// // try {
// //   // Returns a `Facebook\FacebookResponse` object
// //   $response = $fb->get(
// //     '/me/feed',
// //     'EAAFZAkVZAPJZC0BAIud0fdsHOZApwFoM8T2fXtVUOCfOAZA25CKqKKeTGsBxLkGczDG8d3n2dA4OSapZCuOuLeF92o8dV6pdx38uD4lP4fzbugZCOKZA30Wn8u4gI5GdAPbiwAZAdYiXFPCaGkr8g924I5JCjL4gWNrcB1TNR4NP2uH7k81423EvU4yitTtoMzTt2Hd1gzS2hRiYLCiuLZCSC5A2COzYbe33oblPUDM2qROQZDZD'
// //   );
// // } catch(Facebook\Exceptions\FacebookResponseException $e) {
// //   echo 'Graph returned an error: ' . $e->getMessage();
// //   exit;
// // } catch(Facebook\Exceptions\FacebookSDKException $e) {
// //   echo 'Facebook SDK returned an error: ' . $e->getMessage();
// //   exit;
// // }
// // $graphNode = $response->getGraphNode();
// // print_r($graphNode);

// try {
//   // Returns a `Facebook\FacebookResponse` object
//   $response = $fb->get(
//     '/100001824352853/feed',
//     'EAAFZAkVZAPJZC0BAIigBPgxocMui3ZCezoBPyRhfyUud2PqYKceNXsfiOAC0DHJjYJDmllcEx3fZAAnd7vFym6SJ5ZBfrHcUqZB8LBI6seIXU2FWB8lKfZAXDmjK9dG3tDZCJPz7fdfOyv6TJTOSjrFExjlrKimLEh382ZCSDsnJDhRlOtxB6VVpCxryZCoeAo7T3YZD'
//   );
// } catch(Facebook\Exceptions\FacebookResponseException $e) {
//   echo 'Graph returned an error: ' . $e->getMessage();
//   exit;
// } catch(Facebook\Exceptions\FacebookSDKException $e) {
//   echo 'Facebook SDK returned an error: ' . $e->getMessage();
//   exit;
// }
// $graphNode = $response->getGraphNode();



// try {
   
// // Get your UserNode object, replace {access-token} with your token
//   $response = $fb->get('/me', 'EAAFZAkVZAPJZC0BAIud0fdsHOZApwFoM8T2fXtVUOCfOAZA25CKqKKeTGsBxLkGczDG8d3n2dA4OSapZCuOuLeF92o8dV6pdx38uD4lP4fzbugZCOKZA30Wn8u4gI5GdAPbiwAZAdYiXFPCaGkr8g924I5JCjL4gWNrcB1TNR4NP2uH7k81423EvU4yitTtoMzTt2Hd1gzS2hRiYLCiuLZCSC5A2COzYbe33oblPUDM2qROQZDZD');

// } catch(\Facebook\Exceptions\FacebookResponseException $e) {
//         // Returns Graph API errors when they occur
//   echo 'Graph returned an error: ' . $e->getMessage();
//   exit;
// } catch(\Facebook\Exceptions\FacebookSDKException $e) {
//         // Returns SDK errors when validation fails or other local issues
//   echo 'Facebook SDK returned an error: ' . $e->getMessage();
//   exit;
// }

// $me = $response->getGraphUser();

//        //All that is returned in the response
// echo 'All the data returned from the Facebook server: ' . $me;

/* handle the result */