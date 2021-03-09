<?php
/*
Plugin Name: Post Excerpt Meta Box with Short code
Plugin URI: http://wordpress.org/plugins/wedevs-post-view-count-short-code
Description: Plugin Name: Post Excerpt. Write a WordPress plugin where you've to add a 
new metabox named Excerpt under Post. In your custom metabox add a textarea field where user can 
enter post excerpt.  
Also add a new shortcode which will display 10 latest post excerpt by default. 
shortcode needs to be customizable eg: user can specify number of post to display, 
can specify a specific category and can enter post ids. if user provides post ids argument, 
only display excerpt of those ids.
Author: Maniruzzaman Akash
Version: 1.0.0
Author URI: https://akash.devsenv.com
Text Domain: wedevs-pemsc
Domain Path: /languages
*/

if ( ! defined('ABSPATH') ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Post Excerpt Meta Box Short Code Class
 */
final class Post_Excerpt_Meta_Box_Short_Code {

    /**
     * Plugin Version
     * 
     * @var 
     */
    const version = '1.0';

    /** Load Plugins */
    public function __construct () {
        $this->define_constants();

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Define Constant Variables
     *
     * @return void
     */
    public function define_constants () {
        define( 'WD_POST_COUNT_VERSION', self::version );
        define( 'WD_POST_COUNT_FILE', __FILE__ );
        define( 'WD_POST_COUNT_PATH', __DIR__ );
        define( 'WD_POST_COUNT_URL', plugins_url( '', WD_POST_COUNT_FILE ) );
        define( 'WD_POST_COUNT_ASSETS', WD_POST_COUNT_URL . '/assets' );
    }

    /**
     * Initializes a singleton instance
     *
     * @return  \Post_Excerpt_Meta_Box_Short_Code
     */
    private static function init () {
        static $instance = false;

        if ( !$instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Initialization of init ()
     *
     * @return \Post_Excerpt_Meta_Box_Short_Code
     */
    public static function setInit () {
        self::init();
    }

    /**
     * Initialization of plugin
     *
     * @return void
     */
    public function init_plugin () {
        new WeDevs\PostExcerpt\Assets();

        if ( is_admin() ) {
            new WeDevs\PostExcerpt\Admin();
        } else {
            new WeDevs\PostExcerpt\Frontend();
        }
        
    }
}


/**
 * Initializes the main plugin
 *
 * @return \Post_Excerpt_Meta_Box_Short_Code
 */
function Post_Excerpt_Meta_Box_Short_Code () {
    return Post_Excerpt_Meta_Box_Short_Code::setInit();
}

/* start the plugin */
Post_Excerpt_Meta_Box_Short_Code();
