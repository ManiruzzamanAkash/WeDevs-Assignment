<?php
/*
Plugin Name: Featured Post
Plugin URI: http://wordpress.org/plugins/wedevs-featured-post
Description: WA Plugin where you'll have to add a new Settings Page named Featured Posts under Settings menu.  In this page, add 3 settings fields: No of Posts(text), Post order (select box with value: random, asc, desc), Post categories (multiselect). Write a shortcode to display Featured Posts using these three settings fields as filter. 
Author: Maniruzzaman Akash
Version: 1.0.0
Author URI: https://akash.devsenv.com
Text Domain: wedevs-fp
Domain Path: /languages
*/

if ( ! defined('ABSPATH') ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Featured Post Class
 */
final class Featured_Post {

    /**
     * Plugin Version
     * 
     * @var 
     */
    const version = '1.0';

    /** Load Plugins */
    private function __construct () {
        $this->define_constants();

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Define Constant Variables
     *
     * @return void
     */
    private function define_constants () {
        define( 'WD_Featured_Post_VERSION', self::version );
        define( 'WD_Featured_Post_FILE', __FILE__ );
        define( 'WD_Featured_Post_PATH', __DIR__ );
        define( 'WD_Featured_Post_URL', plugins_url( '', WD_Featured_Post_FILE ) );
        define( 'WD_Featured_Post_ASSETS', WD_Featured_Post_URL . '/assets' );
    }

    /**
     * Initializes a singleton instance
     *
     * @return  \Featured_Post
     */
    public static function init () {
        static $instance = false;

        if ( !$instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Initialization of plugin
     *
     * @return void
     */
    public function init_plugin () {
        new WeDevs\FeaturedPost\Assets();

        if ( is_admin() ) {
            new WeDevs\FeaturedPost\Admin();
        }
        
    }
}


/**
 * Initializes the main plugin
 *
 * @return \Featured_Post
 */
function Featured_Post () {
    return Featured_Post::init();
}

/* start the plugin */
Featured_Post();
