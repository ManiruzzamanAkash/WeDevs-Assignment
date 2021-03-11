<?php
/*
Plugin Name: Latest Post Widget
Plugin URI: http://wordpress.org/plugins/wedevs-latest-post-widget
Description: A plugin where you'll have to add a new dashboard widget and display latest 5 posts title. Widget needs to be customizable eg: user can input number of posts to display, sort post, select a category etc. 
Author: Maniruzzaman Akash
Version: 1.0.0
Author URI: https://akash.devsenv.com
Text Domain: wedevs-lpw
Domain Path: /languages
*/

if ( ! defined('ABSPATH') ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Post Excerpt Meta Box Short Code Class
 */
final class Latest_Post_Widget {

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
        define( 'WD_Latest_Post_Widget_VERSION', self::version );
        define( 'WD_Latest_Post_Widget_FILE', __FILE__ );
        define( 'WD_Latest_Post_Widget_PATH', __DIR__ );
        define( 'WD_Latest_Post_Widget_URL', plugins_url( '', WD_Latest_Post_Widget_FILE ) );
        define( 'WD_Latest_Post_Widget_ASSETS', WD_Latest_Post_Widget_URL . '/assets' );
    }

    /**
     * Initializes a singleton instance
     *
     * @return  \Latest_Post_Widget
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
        new WeDevs\LatestPostWidget\Assets();

        if ( is_admin() ) {
            new WeDevs\LatestPostWidget\Admin();
        }
        
    }
}


/**
 * Initializes the main plugin
 *
 * @return \Latest_Post_Widget
 */
function Latest_Post_Widget () {
    return Latest_Post_Widget::init();
}

/* start the plugin */
Latest_Post_Widget();
