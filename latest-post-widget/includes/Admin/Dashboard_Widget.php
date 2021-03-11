<?php

namespace WeDevs\LatestPostWidget\Admin;

/**
 * Dashboard Widget Class
 * 
 * Manage Dashboard widgets
 */
class Dashboard_Widget {

    public function __construct () {
        add_action( 'init', [ $this, 'create_widgets' ] ); 
    }
    
    /**
     * Create Widgets for dashboard
     *
     * @return void
     */
    public function create_widgets () {
        wp_enqueue_style( 'wedevs-latest-post-style' );

        add_action( 'wp_dashboard_setup', [ $this, 'add_dashboard_widgets' ] );
    }

    /**
     * Add Dashboard Widgets
     *
     * @return void
     */
    public function add_dashboard_widgets() {
        wp_add_dashboard_widget(
            'wporg_dashboard_widget',
            esc_html__( 'Latest Post', 'wedevs-lpw' ),
            [ $this, 'dashboard_widget_render' ]
        );
    }

    /**
     * Dashboard Widget Renderer
     *
     * @return void
     */
    public function dashboard_widget_render() {
        $latest_posts = wedevs_lpw_get_latest_posts();
        include_once __DIR__ . '/views/latest-post-widget.php';
    }

}

