<?php
/*
Plugin Name: Post View Count Short Code
Plugin URI: http://wordpress.org/plugins/wedevs-post-view-count-short-code
Description: A plugin where a new vew count will be added after every post
Author: Maniruzzaman Akash
Version: 1.0.0
Author URI: https://akash.devsenv.com
Text Domain: wedevs-pvcsc
Domain Path: /languages
*/

if ( ! defined('ABSPATH') ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Post View Count Class
 */
final class Post_View_Count_Short_Code {

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
     * @return  \Post_View_Count_Short_Code
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
        new WeDevs\PostViewCount\Assets();

        if ( is_admin() ) {
            new WeDevs\PostViewCount\Admin();
        } else {
            new WeDevs\PostViewCount\Frontend();
        }
    }
}


/**
 * Initializes the main plugin
 *
 * @return \Post_View_Count_Short_Code
 */
function Post_View_Count_Short_Code () {
    return Post_View_Count_Short_Code::init();
}

/* start the plugin */
Post_View_Count_Short_Code();
