<?php
/*
Plugin Name: Book Review
Plugin URI: http://wordpress.org/plugins/wedevs-book-review
Description: Register a custom post type named Books. Add default category support for Books. Add custom metabox to get related information about each books. Display each custom fields on frontend by customizing page templates.
Author: Maniruzzaman Akash
Version: 1.0.0
Author URI: https://akash.devsenv.com
Text Domain: wedevs-brp
Domain Path: /languages
*/

if ( ! defined('ABSPATH') ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Post Excerpt Meta Box Short Code Class
 */
final class Book_Review {

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

        // register_activation_hook( __FILE__, [ $this, 'wedevs_brp_flush_urls' ] );

    }

    public function wedevs_brp_flush_urls () {
        flush_rewrite_rules();
    }

    /**
     * Define Constant Variables
     *
     * @return void
     */
    public function define_constants () {
        define( 'WD_BOOK_REVIEW_VERSION', self::version );
        define( 'WD_BOOK_REVIEW_FILE', __FILE__ );
        define( 'WD_BOOK_REVIEW_PATH', __DIR__ );
        define( 'WD_BOOK_REVIEW_URL', plugins_url( '', WD_BOOK_REVIEW_FILE ) );
        define( 'WD_BOOK_REVIEW_ASSETS', WD_BOOK_REVIEW_URL . '/assets' );
        define( 'WD_BOOK_POST_TYPE', 'books' );
    }

    /**
     * Initializes a singleton instance
     *
     * @return  \Book_Review
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
     * @return \Book_Review
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
        new WeDevs\BookReview\Assets();

        if ( is_admin() ) {
            new WeDevs\BookReview\Admin();
        } else {
            new WeDevs\BookReview\Frontend();
        }
        
    }
}


/**
 * Initializes the main plugin
 *
 * @return \Book_Review
 */
function Book_Review () {
    return Book_Review::setInit();
}

/* start the plugin */
Book_Review();
