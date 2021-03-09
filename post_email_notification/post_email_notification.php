<?php
/*
Plugin Name: Post Email Notification
Plugin URI: http://wordpress.org/plugins/wedevs-post-email-notification
Description: A plugin where admin will get an email after a new post is published.
Author: Maniruzzaman Akash
Version: 1.0.0
Author URI: https://akash.devsenv.com
Text Domain: wedevs-pen
Domain Path: /languages
*/

if ( ! defined('ABSPATH') ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Post Email Notification Class
 * 
 */
final class Post_Email_Notification {

     /**
     * Plugin Version
     * 
     * @var 
     */
    const version = '1.0.0';

    public function __construct () {
        $this->define_constants();

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return  \Post_Email_Notification
     */
    public static function init () {
        static $instance = false;

        if ( !$instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define Initial constants
     *
     * @return void
     */
    public function define_constants () {
        define( 'WD_PEN_VERSION', self::version );
        define( 'WD_PEN_FILE', __FILE__ );
        define( 'WD_PEN_PATH', __DIR__ );
        define( 'WD_PEN_URL', plugins_url( '', WD_PEN_FILE ) );
    }

    /**
     * Initialization of plugin
     *
     * @return void
     */
    public function init_plugin () {
        add_action( 'transition_post_status', [ $this, 'wedevs_pen_send_email_on_post' ], 10, 3 );
    }

    /**
     * Send Email on publish post
     * 
     * When any post will be published, an email will be sent to the admin
     *
     * @param int $post_id
     * 
     * @return void
     */
    public function wedevs_pen_send_email_on_post ( $new_status, $old_status, $post ) {
        
        if ( 'publish' === $new_status && 'publish' !== $old_status ) {

            // Since mail is not tasted, adds a dummy option for testing...
            add_option( 'mail_send_or_not_testing_new', '1' );

            /** Admins will be the default senders */
            // $default_senders    = get_users( array ( 'role' => 'administrator' ));

            $emails = get_option( 'admin_email' );
            
            apply_filters( 'wedevs_pen_email_senders', $emails ); // Custom wedevs_pen_email_senders() filter
            // $emails             = array();

            // foreach ( $email_senders as $email_sender ) {
            //     $emails[] = $email_sender->user_email;
            // }

            $body = sprintf( 'Hey there is a new post. Take a look at it - <%s>',
                get_permalink( $post )
            );

            wp_mail( $emails, 'New post published !', $body );
        }

    }

}


/**
 * Initializes the main plugin
 *
 * @return \Post_Email_Notification
 */
function post_email_notification () {
    return Post_Email_Notification::init();
}

/* start the plugin */
post_email_notification();
