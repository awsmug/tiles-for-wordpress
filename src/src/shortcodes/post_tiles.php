<?php

namespace TFWP\Shortcodes;

use TFWP\Template;

use Skip\Skip_Exception;
use Skip\System\Logger;
use Skip\WP\Shortcode;

/**
 * Class Post_Tiles
 *
 * @package TFWP
 *
 * @since 1.0.0
 */
class Post_Tiles extends Shortcode {
	use Logger;

	/**
	 * Executing shortcode
	 *
	 * @param array $atts
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function execute( $atts ) {
		$defaults = array(
			'numberposts' => 5,
			'post_type' => 'post'
		);

		$args = $this->parse_atts( $defaults, $atts );
		$posts = get_posts( $args );

		try {
			if ( count( $posts ) === 0 ) {
				$template = new Template( 'empty' );
				$html = $template->load();
			} else {
				$template = new Template( 'post_loop', $posts );
				$html = $template->load();
			}
		} catch ( Skip_Exception $exception ) {
			$this->log_exception( $exception, 5 );
			$html = 'Error on executing shortcode ' . $this->get_name();
		}

		return $html;
	}
}