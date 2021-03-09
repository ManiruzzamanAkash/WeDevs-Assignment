<?php

namespace WeDevs\PostViewCount;

/**
 * Frontend Class
 */
class Frontend {

    /**
     * Register Short codes
     */
    public function __construct () {
        new Frontend\PostList();

        add_filter( 'the_content', [ $this, 'wedevs_pvcsc_posts_view_count' ] );
    }

    /**
     * Post View Count
     *
     * @param string $content
     * 
     * @return string
     */
    public function wedevs_pvcsc_posts_view_count ( $content ) {
        global $post;

        if ( $post->post_type === 'post' ) {
            $view_count = wedevs_pvcsc_get_post_view_count( get_the_ID() );

            $label      = __( 'Total Hit', 'wedevs-pvc' );
            $tag        = apply_filters( "wedevs_pvcsc_tag", 'h4' );      // Custom filter to change tags, default em
            $label      = apply_filters( "wedevs_pvcsc_label", $label );  // Custom filter to change label

            $content   .= sprintf( '<%s>%s: %s</%s>', $tag, $label, $view_count, $tag );
        }
        
        return $content;
    }

}
