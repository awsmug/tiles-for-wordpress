<?php
/**
 * Tiles for WordPress main file
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Tiles_For_WordPress
 *
 * @wordpress-plugin
 * Plugin Name:       Tiles for WordPress
 * Plugin URI:        https://wordpress.org/plugins/tiles-for-wordpress
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Awesome UG
 * Author URI:        http://awesome.ug
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       tiles-for-wordpress
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

require __DIR__ . '/vendor/autoload.php';

use \Skip\WP\Plugin;
use \Skip\WP\Admin_Notices;

use \TFWP\Shortcodes\Post_Tiles;

class Tiles_For_WordPress extends Plugin {
	use Admin_Notices;

	/**
	 * Shortcodes
	 *
	 * @var array
	 *
	 * @since 1.0.0
	 */
	private $shortcodes = array();

	/**
	 * Running plugin
	 *
	 * @since 1.0.0
	 */
	public function run() {
		$this->add_notice( 'Plugin is running.' );
	}

	/**
	 * Setting up plugin
	 *
	 * @since 1.0.0
	 */
	protected function setup() {
		require_once 'vendor/autoload.php';

		$this->init_admin_notices();
		$this->shortcodes[] = new Post_Tiles();

		$this->add_css( $this->get_asset_url( 'frontend', 'css' ) );
		$this->add_js( $this->get_asset_url( 'frontend', 'js' ) );
	}
}

/**
 * Plugin super function
 *
 * @throws \Skip\Skip_Exception
 *
 * @since 1.0.0
 */
function tiles_for_wordpress() {
	return Tiles_For_WordPress::get_instance();
}

tiles_for_wordpress();