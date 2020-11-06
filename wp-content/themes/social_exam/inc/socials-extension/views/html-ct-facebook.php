

<?php 
	$iframe_src = "https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/{$fb_data['page_name']}&tabs={$atts['tabs']}&width={$atts['width']}&height={$atts['height']}&small_header={$atts['small_header']}&adapt_container_width={$atts['adapt_container']}&hide_cover=true&show_facepile=false&appId={$fb_data['api_key']}";

?>

<iframe src="<?php echo esc_html($iframe_src); ?>" width="<?php echo esc_html($atts['width']); ?>" height="<?php echo esc_html($atts['height']); ?>" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>