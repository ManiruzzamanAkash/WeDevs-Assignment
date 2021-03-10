<?php

namespace WeDevs\BookReview\Admin;

class Custom_Taxonomy_Handler {

    public function __construct () {
        add_action( 'init', [ $this, 'register_custom_taxonomy' ] );
    }

    /**
     * Register Custom Taxonomy 'Publisher'
     *
     * @return void
     */
    public function register_custom_taxonomy ()
    {
        $labels = array(
            'name'              => _x( 'Publishers', 'taxonomy general name' ),
            'singular_name'     => _x( 'Course', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Publishers' ),
            'all_items'         => __( 'All Publishers' ),
            'parent_item'       => __( 'Parent Publisher' ),
            'parent_item_colon' => __( 'Parent Publisher:' ),
            'edit_item'         => __( 'Edit Publisher' ),
            'update_item'       => __( 'Update Publisher' ),
            'add_new_item'      => __( 'Add New Publisher' ),
            'new_item_name'     => __( 'New Publisher Name' ),
            'menu_name'         => __( 'Publisher' ),
        );
        $args   = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'publisher' ],
        );
        register_taxonomy( 'publisher', [ WD_BOOK_POST_TYPE ], $args );
    }

}