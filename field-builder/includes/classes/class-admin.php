<?php

namespace ERP_CFB;

/**
 * Admin Pages Handler
 */
class Admin {

    public function __construct() {
        // add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        add_action( 'erp_acct_js_hook_loaded', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Initialize our hooks for the admin page
     *
     * @return void
     */
    public function init_hooks() {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Load scripts and styles for the app
     *
     * @return void
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'erp-cfb-admin' );
        wp_enqueue_script( 'erp-cfb-admin' );
    }

}
