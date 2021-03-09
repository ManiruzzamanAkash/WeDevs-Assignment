<?php

namespace WeDevs\PostExcerpt\Admin;

/**
 * Meta Box Handler Class
 */
class Meta_Box_Handler {
    
    /**
     * Post List
     * 
     * Post list whice will be added for post excerpt
     *
     * @var array
     */
    public $posts;

    public function __construct () {
        $this->posts = wedevs_pemsc_get_all_posts();
        add_action( 'init', [ $this, 'manage_meta_box' ] );
    }

    /**
     * Add Meta Boxes Action
     *
     * @return void
     */
    public function manage_meta_box () {
        add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );

        add_action( 'save_post', [ $this, 'save_post_with_metabox' ] );
    }

    /**
     * Add Custom Single Meta Box
     * 
     * Add Meta Boxes for every post type admin page
     */
    public function add_custom_meta_box () {
        $screens = [ 'post', 'page' ];

        foreach ( $screens as $screen ) {
            add_meta_box(
                'wedevs_pemsc_post_excerpt_id',
                'Post Excerpt', 
                [ $this, 'meta_box_html' ],
                $screen
            );
        }
    }

    /**
     * Met Box HTML File
     *
     * @return string
     */
    public function meta_box_html () {
        include __DIR__ . '/views/meta-box-excerpt.php';
    }

    /**
     * Save Post with Metabox Post Meta Data
     *
     * @param int $post_id
     * 
     * @return void
     */
    public function save_post_with_metabox ( $post_id ) {
        $excerpt_text = isset( $_POST['wedevs_pemsc_post_excerpt'] ) ? sanitize_text_field( $_POST['wedevs_pemsc_post_excerpt'] ) : null;
        
        if ( !is_null ( $excerpt_text ) ) {
            update_post_meta(
                $post_id,
                'wedevs_pemsc_post_excerpt',
                $_POST['wedevs_pemsc_post_excerpt']
            );
        }
    }

}