<?php

namespace WeDevs\BookReview\Frontend;

class Post_Content_View
{
    public function __construct() {
        add_action( 'the_content', [ $this, 'modify_post_content' ] );
    }

    /**
     * Modify Post Contnt
     *
     * @param string $content
     * 
     * @return string
     */
    public function modify_post_content ( $content ) {

        $wedevs_brp_authors = get_post_meta(get_the_ID(), 'wedevs_brp_authors', true);
        $wedevs_brp_price   = get_post_meta(get_the_ID(), 'wedevs_brp_price', true);
        $wedevs_brp_rating  = get_post_meta(get_the_ID(), 'wedevs_brp_rating', true);

        $content   = "";
        $content  .= "Authors: $wedevs_brp_authors, ";
        $content  .= "Price  : $wedevs_brp_price  BDT, ";
        $content  .= "Rating : $wedevs_brp_rating";

        return $content;
    }
}
