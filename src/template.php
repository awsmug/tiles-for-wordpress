<?php

namespace TFWP;

use Skip\Skip_Exception;
use \Skip\WP\Template_Loader;

/**
 * Class Template
 *
 * @package TFWP
 *
 * @since 1.0.0
 */
class Template extends Template_Loader {
	/**
	 * Setting up template loader
	 *
	 * @throws Skip_Exception
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
			$vars = array(
				'post' => $post
			);

			self::load_template( $this->get_template_file(), true, $vars );
		}
	}

	/**
	 *
	 *
	 * @param string $method
	 * @param array $arguments
	 *
	 * @throws Skip_Exception
	 */
	public function __call( $method, $arguments ) {
		if( 'template_post_loop' === $method || 'template_empty' === $method ) {
			return parent::__call( $method, $arguments );
		}
	}
}