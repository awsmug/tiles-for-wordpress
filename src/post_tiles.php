<?php

namespace TFWP;

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
		$posts = $this->get_posts( $args );

		try {
			if ( count( $posts ) === 0 ) {
				$html = new Templates( 'empty' );
			} else {
				$html = new Templates( 'post_loop', $posts );
			}
		} catch ( Skip_Exception $exception ) {
			$this->log_exception( $exception, 5 );
			$html = 'Error on executing shortcode ' . $this->get_name();
		}

		return $html;
	}

	/**
	 * Getting posts
	 *
	 * @param array $args {
	 *     Optional. Arguments to retrieve posts. See WP_Query::parse_query() for all
	 *     available arguments.
	 *
	 *     @type int        $numberposts      Total number of posts to retrieve. Is an alias of $posts_per_page
	 *                                        in WP_Query. Accepts -1 for all. Default 5.
 	 *     @type int|string $category         Category ID or comma-separated list of IDs (this or any children).
	 *                                        Is an alias of $cat in WP_Query. Default 0.
	 *     @type array      $include          An array of post IDs to retrieve, sticky posts will be included.
	 *                                        Is an alias of $post__in in WP_Query. Default empty array.
	 *     @type array      $exclude          An array of post IDs not to retrieve. Default empty array.
	 *     @type bool       $suppress_filters Whether to suppress filters. Default true.
	 * }
	 *
	 * @return \WP_Post[] All Posts in an array
	 *
	 * @since 1.0.0
	 */
	private function get_posts( $args ) {
		$posts = get_posts( $args );
		return $posts;
	}
}