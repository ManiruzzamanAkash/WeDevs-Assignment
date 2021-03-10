<?php

namespace WeDevs\BookReview\Admin;

/**
 * Meta Box Handler Class
 */
class Meta_Box_Handler {

    public function __construct () {
        add_action( 'init', [ $this, 'manage_meta_box' ] );
    }

    /**
     * Add Meta Boxes Action
     *
     * @return void
     */
    public function manage_meta_box () {
        add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );

        add_action( 'save_post', [ $this, 'save_book_with_metabox_information' ] );
    }

    /**
     * Add Custom Single Meta Box
     * 
     * Add Meta Boxes for every post type admin page
     */
    public function add_custom_meta_box () {
        $screens = [ 'post', 'page', WD_BOOK_POST_TYPE ];

        foreach ( $screens as $screen ) {
            add_meta_box(
                'wedevs_brp_price_id',
                'Book Meta Information', 
                [ $this, 'meta_box_html' ],
                $screen,
                apply_filters( 'wedevs_brp_change_sidebar', 'advanced' ),
            );
        }
    }

    /**
     * Met Box HTML File
     *
     * @return string
     */
    public function meta_box_html () {
        include __DIR__ . '/views/book-meta-info.php';
    }

    /**
     * Save Post with Metabox Post Meta Data
     *
     * @param int $post_id
     * 
     * @return void
     */
    public function save_book_with_metabox_information ( $post_id ) {

        // Verify Nonce
        if ( ! wp_verify_nonce( $_POST['wedevs_brp_meta_info'], WD_BOOK_REVIEW_FILE ) ) {
            return;
        }

        // Check Permission
        if ( ! current_user_can( 'edit_posts' ) ) {
            return;
        }

        $args = array (
            'wedevs_brp_price'   => isset( $_POST['wedevs_brp_price'] ) ? sanitize_text_field( $_POST['wedevs_brp_price'] )    : null,
            'wedevs_brp_authors' => isset( $_POST['wedevs_brp_authors'] ) ? sanitize_text_field( $_POST['wedevs_brp_authors'] ): null,
            'wedevs_brp_rating'  => isset( $_POST['wedevs_brp_rating'] ) ? sanitize_text_field( $_POST['wedevs_brp_rating'] )  : null,
        );

        foreach ( $args as $key => $arg ) {
            if ( !is_null ( $arg ) ) {
                update_post_meta(
                    $post_id,
                    $key,
                    $arg
                );
            }   
        }
    }

}