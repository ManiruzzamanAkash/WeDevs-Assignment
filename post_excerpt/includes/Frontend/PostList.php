<?php

namespace WeDevs\PostExcerpt\Frontend;

/**
 * Class PostList 
 * 
 * Post List ShortCode Generator
 * 
 * Create PostList Short code for frontend
 */
class PostList
{
    /**
     * Posts
     *
     * @var array
     */
    public $posts;
    
    /**
     * Attrbutes Passed from Shortcode
     *
     * @var array
     */
    public $atts;

    public function __construct() {
        $this->posts    = [];
        $this->atts     = [];

        add_shortcode( 'wedevs-pemsc-post-list', [ $this, 'render_shortcode' ] );
    }

    /**
     * Shortcode handler class
     *
     * @param array $atts
     * @param string $content
     * 
     * @return string
     */
    public function render_shortcode ( $atts ) {
        $this->atts = $atts;
        $this->get_posts_data();

        wp_enqueue_style( 'wedevs-post-list-style' );

        ob_start();
        include __DIR__ . '/views/post-list.php';

        return ob_get_clean();
    }

    /**
     * Get Posts Data and set 
     *
     * @return void
     */
    public function get_posts_data () {

        $defaults = [
            'total_number_of_posts' => apply_filters( 'wedevs_pvcsc_total_post', 10 ),
            'sort_by'               => apply_filters( 'wedevs_pvcsc_sorting_by', 'desc' ),
            'post_in'               => apply_filters( 'wedevs_pvcsc_post_ids', '' )
        ];

        // Parse post_ids atts from shortcode input and make that an array
        $post_ids = ( isset( $this->atts['post_ids']) && strlen( $this->atts['post_ids'] ) > 0 ) ? sanitize_text_field( trim( $this->atts['post_ids'] ) ) : $defaults['post_in'];
        $post_ids = explode( ',', $post_ids );

        $total_number_of_posts  = isset( $this->atts['post_num'] ) ? intval( $this->atts['post_num'] ) : $defaults['total_number_of_posts'];
        $sort_by                = isset( $this->atts['sort'] ) ? sanitize_text_field( $this->atts['sort'] ) : $defaults['sort_by'];
        $post_in                = isset( $this->atts['post_ids'] ) ? $post_ids : $defaults['post_in'];

        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => $total_number_of_posts,
            'post__in'          => $post_in,
            'order'             => $sort_by,
            'orderby'           => 'meta_value_num',
            'meta_key'          => 'post_view_count', 
            'meta_query'        => array(
                'relation'      => 'OR',
                 array(
                         'key'      => 'post_view_count',
                         'compare'  => '>=',
                         'value'    => 0
                     ),
                   array(
                         'key'      => 'post_view_count',
                         'value'    => null,
                         'compare'  => 'NOT EXISTS'
                     )
                 ),
        );
    
        $the_query      = new \WP_Query( $args );
        $this->posts    = $the_query->get_posts();
    }
}
