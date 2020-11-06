<?php 

abstract class shortCodeExtension {

	public function get_font_awesome_icon( $iconClass ) {

		switch ( $iconClass ) {
			
			case 'facebook':
				return 'fab fa-facebook-f'; 
				break;
			
			case 'twitter':
				return 'fab fa-twitter';
				break;

			default:
				return '';
				break;

		}

	}

	public function get_user_social_link( $type, $user_id ) {

		$type = strtolower($type);

		switch ( $type ) {
			case 'facebook':
				return "https://www.facebook.com/{$user_id}";
				break;
			
			case 'twitter':
				return "https://www.twitter.com/{$user_id}";
				break;

			default:
				return '';
				break;
		}

	}

}