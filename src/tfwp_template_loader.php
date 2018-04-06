<?php

namespace TFWP;

use \Skip\WP\Template_Loader;

/**
 * Class WP_Tiles_Template_Loader
 *
 * @package TFWP
 *
 * @since 1.0.0
 */
class TFWP_Template_Loader extends Template_Loader {
	/**
	 * Setting up template loader
	 *
	 * @throws \Skip\Skip_Exception
	 *
	 * @since 1.0.0
	 */
	protected function init() {
		$this->set_template_prefix( 'tfwp' );
		$this->add_template_path( \Tiles_For_WordPress::get_path() .'/templates' );
	}

	/**
	 * Loading template on post loop
	 *
	 * @since 1.0.0
	 */
	protected function template_post_loop() {
		$posts = $this->get_argument( 1 );

		foreach( $posts AS $post ) {
			load_template( $this->get_template_file() );
		}
	}
}