<?php

namespace TFWP;

use Skip\WP\Shortcode;

/**
 * Class Post_Tiles
 *
 * @package TFWP
 *
 * @since 1.0.0
 */
class Post_Tiles extends Shortcode {
	/**
	 * Executing shortcode
	 *
	 * @param array $atts
	 *
	 * @return mixed|void
	 *
	 * @since 1.0.0
	 */
	public function execute( $atts ) {
		$defaults = array(
			'posts_per_page' => 5,
			'post_type' => 'post'
		);

		$this->parse_atts( $defaults, $atts );
	}
}