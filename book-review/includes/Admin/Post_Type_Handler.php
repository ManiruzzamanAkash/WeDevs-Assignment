<?php

namespace WeDevs\BookReview\Admin;

/**
 * Custom Post Type Handler
 */
class Post_Type_Handler {
    
    public function __construct () {
        add_action( 'init', [ $this, 'register_custom_post_types' ] );
        add_action( 'init', [ $this, 'remove_post_types' ] );

        add_filter( 'post_updated_messages', [ $this, 'updated_message' ] );
    }

    /**
     * Register Custom Post Types
     *
     * @return void
     */
    public function register_custom_post_types () {

        $labels = array(
            'name'               => __( 'Books', 'wedevs-brp' ),
            'singular_name'      => __( 'Book', 'wedevs-brp' ),
            'add_new'            => __( 'Add New', 'wedevs-brp' ),
            'add_new_item'       => __( 'Add New Book', 'wedevs-brp' ),
            'edit_item'          => __( 'Edit Book', 'wedevs-brp' ),
            'new_item'           => __( 'New Book', 'wedevs-brp' ),
            'all_items'          => __( 'All Books', 'wedevs-brp' ),
            'view_item'          => __( 'View Book', 'wedevs-brp' ),
            'search_items'       => __( 'Search Books', 'wedevs-brp' ),
            'not_found'          => __( 'No Books found', 'wedevs-brp' ),
            'not_found_in_trash' => __( 'No Books found in the Trash', 'wedevs-brp' ),
            'menu_name'          => 'Books'
        );

        $args = array(
            'labels'            => $labels,
            'description'       => 'Review Books',
            'hierarchical'      => false,
            'public'            => true,
            'has_archive'       => true, 
            'menu_position'     => 5,
            'menu_icon'         => 'dashicons-book',
            'taxonomies'        => array( 'category' ),
            'supports'          => array( 'title', 'editor', 'thumbnail', 'comments' ),
            'rewrite'           => array( 'slug' => 'books' )
        );

        register_post_type( WD_BOOK_POST_TYPE, $args );
    }

    /**
     * Remove Post Types
     *
     * @return void
     */
    public function remove_post_types () { 
        remove_post_type_support( WD_BOOK_POST_TYPE, 'comments', 'discussion' );
    }

    /**
     * Updated Messages
     *
     * @param array $messages
     * 
     * @return array $messages after being modified
     */
    public function updated_message ( $messages ) {
        global $post, $post_ID;

        $messages['Book'] = array(
          0  => '', 
          1  => sprintf( __('Book updated. <a href                                                                                                     = "%s">View Book</a>'), esc_url( get_permalink($post_ID) ) ),
          2  => __('Custom field updated.'),
          3  => __('Custom field deleted.'),
          4  => __('Book updated.'),
          5  => isset($_GET['revision']) ? sprintf( __('Book restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ): false,
          6  => sprintf( __('Book published. <a href                                                                                                   = "%s">View Book</a>'), esc_url( get_permalink($post_ID) ) ),
          7  => __('Book saved.'),
          8  => sprintf( __('Book submitted. <a target                                                                                                 = "_blank" href                    = "%s">Preview Book</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
          9  => sprintf( __('Book scheduled for                                                                                                        : <strong>%1$s</strong>. <a target = "_blank" href = "%2$s">Preview Book</a>'), date_i18n( __( 'M j, Y @ G: i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
          10 => sprintf( __('Book draft updated. <a target                                                                                             = "_blank" href                    = "%s">Preview Book</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        );

        return $messages;
    }
}