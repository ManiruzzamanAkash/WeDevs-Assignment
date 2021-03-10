<?php

namespace WeDevs\BookReview;

/**
 * Admin Class
 */
class Admin {

    public function __construct () {
        new Admin\Post_Type_Handler();
        new Admin\Custom_Taxonomy_Handler();
        new Admin\Meta_Box_Handler();
    }

}
